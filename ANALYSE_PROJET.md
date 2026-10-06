# Analyse de libala.org

Date : 6 octobre 2026. Périmètre : copie locale du projet, code applicatif, routes, modèles, migrations, vues, ressources statiques, dépendances et configuration. Aucun changement du code métier ni des données existantes.

## Diagnostic

Le projet constitue une base fonctionnelle de gestion de mariages et d’invitations numériques. Les principaux parcours existent, mais plusieurs défauts de sécurité et de fiabilité doivent être corrigés avant de considérer cette version comme prête pour la production. Le défaut prioritaire concerne l’accès anonyme au panneau d’administration.

## Produit et architecture

- Site vitrine, présentation des offres et contact/commande par lien WhatsApp ; aucun paiement intégré identifié.
- Gestion administrative des mariages, utilisateurs et modèles graphiques avec Filament.
- Connexion d’un gestionnaire par référence du mariage et mot de passe.
- Gestion des invités, téléphones, tables, capacités et affectations.
- Invitations individuelles, QR codes, réponses RSVP et contrôle des arrivées par saisie ou caméra.
- Choix de modèles, photos du couple, galerie et miniature ; export PNG prévu.
- Laravel 10.48.29, Filament 3.3.16, Livewire 3.6.3, Blade, Simple QRCode et Browsershot 5.0.10.
- Six modèles applicatifs : User, Event, Guest, Table, GuestTable et Template. Event sert aussi d’identité d’authentification.
- Deux gardes de session : web et event_manager. API limitée à la lecture de l’utilisateur connecté via Sanctum.
- Structure Laravel classique, logique métier principalement dans les contrôleurs et pages Filament. Pas de policies applicatives identifiées.

## Constats prioritaires

### 1. Critique — administration accessible sans connexion

Preuve : `app/Providers/Filament/AdminPanelProvider.php:56`, les deux middlewares d’authentification sont commentés. La liste des routes confirme leur absence. En exécution isolée, les accès anonymes à `/admin/users/create` et `/admin/events` retournent HTTP 200. Les autorisations Filament de création d’utilisateur et de consultation des événements retournent également vrai sans utilisateur.

Conséquence : les opérations administratives ne bénéficient pas de la barrière d’authentification attendue. Aucune mutation HTTP administrative n’a été tentée ; le problème est déjà confirmé par les pages et autorisations.

Correction : rétablir une authentification obligatoire, définir les droits des administrateurs et gestionnaires, puis tester l’accès anonyme et chaque opération sensible.

### 2. Élevée — absence d’isolation des gestionnaires par mariage

Preuves : `ManageGuests.php:32`, `ManageTables.php:28`, `ManageGuestTables.php:32` et `PreviewEvent.php` chargent directement l’événement demandé. Aucune vérification du mariage appartenant au gestionnaire ni policy n’est définie. Masquer les menus via `shouldRegisterNavigation()` et désactiver des champs ne protège pas les URL ou les actions.

Correction : vérifier systématiquement la propriété du mariage dans les pages, requêtes et actions ; interdire les ressources utilisateurs/templates aux gestionnaires. Réactiver seulement le middleware ne suffira pas : User et Event n’implémentent pas FilamentUser, et le middleware multiple les refuse hors environnement local. Le garde Filament et le garde gestionnaire doivent aussi être rendus cohérents.

### 3. Élevée — double hachage des mots de passe

Preuve : `EventResource.php` applique bcrypt au formulaire, puis `app/Models/Event.php:56` applique de nouveau bcrypt si `needsRehash()` est faux. Un test isolé confirme que le mot de passe initial ne correspond plus après création.

La condition inversée laisse également passer un mot de passe brut fourni directement au modèle, au lieu de le hacher.

Correction : centraliser le hachage dans un seul mécanisme fiable, puis prévoir une réinitialisation pour les mariages déjà affectés. Tester création, changement et conservation du mot de passe.

### 4. Élevée — contrôle des entrées public et non atomique

Preuve : `InvitationVerifierController.php:16` recherche le code et inscrit immédiatement l’heure d’arrivée. La route ne requiert aucune authentification ni permission propre à un événement. Test isolé : une requête anonyme contenant un code valide enregistre l’arrivée.

Conséquences : un détenteur du lien peut faire enregistrer une entrée à distance ; deux scans simultanés peuvent être acceptés avant que l’un voie l’écriture de l’autre.

Correction : réserver l’opération à un agent autorisé pour ce mariage, valider le code, limiter les tentatives et rendre l’enregistrement atomique.

### 5. Élevée — association événement/invitation non vérifiée à l’affichage

Preuve : `HomeController.php:23` et `:38` recherchent séparément l’événement par référence et l’invitation par code. Un code valide d’un mariage peut être associé à la référence d’un autre. Le RSVP, lui, vérifie correctement cette relation.

Correction : charger l’invitation à travers l’événement pour tous les parcours, y compris images et exports.

### 6. Élevée — validations et capacité de placement incomplètes

Preuves : `ManageGuestTables.php:93` écrit directement les valeurs de `$this->data`, sans `getState()` ni validation explicite de l’affectation. `ManageGuests.php:87` suit également ce schéma pour le formulaire d’ajout.

Les options visibles filtrent les invités et tables, mais l’écriture ne revérifie pas leur appartenance au mariage, l’absence de doublon ou la capacité. La base ne définit pas d’unicité sur le code d’invitation ou le couple événement/invité. Les contrôles de quota ne sont pas transactionnels.

La capacité compte des invitations, alors que chaque RSVP autorise jusqu’à dix personnes. Une table de dix places peut donc représenter bien plus de dix personnes. Une capacité nulle est autorisée en base et formulaire, mais ne passe pas le filtre de places restantes.

Correction : définir la capacité en personnes ou invitations, valider côté serveur, ajouter les contraintes pertinentes après nettoyage des données, et protéger les écritures concurrentes.

### 7. Moyenne — export PNG non opérationnel en l’état local

Preuve : `HomeController.php:62` utilise un chemin Chrome Windows fictif alors que le projet est sur macOS. Aucun runtime Node accessible dans le PATH de cette session ; Puppeteer n’est pas déclaré dans package.json.

L’export est synchrone sur une route publique GET, sans limitation de fréquence, création explicite du dossier cible, ni invalidation du cache après modification du mariage.

Correction : rendre l’environnement de rendu configurable, installer ses prérequis et vérifier le résultat ; valider l’invitation avant rendu, gérer les erreurs et les fichiers, limiter les requêtes, puis utiliser une file de tâches si le volume le justifie.

## Autres anomalies

- `HomeController::template_detail()` dépend d’une référence et d’un code d’invitation codés en dur : les démonstrations échouent sans ces données et peuvent utiliser une vraie invitation. Prévoir des données fictives dédiées.
- Deux actions Filament portent le même identifiant `voir_invitation` dans ManageGuestTables : donner un identifiant distinct à la miniature.
- Le formulaire UserResource ne traite pas explicitement la conservation du mot de passe à l’édition : vérifier et corriger le comportement vide/prérempli pour éviter une valeur nulle ou un nouveau hachage du hash existant.
- Aucune limitation de tentatives sur la connexion gestionnaire. La déconnexion ne réalise pas explicitement l’invalidation de session et la régénération du jeton CSRF.
- Un refus RSVP exige tout de même au moins une personne. Harmoniser le nombre de présents avec le refus, les places autorisées et les réponses déjà enregistrées.
- Le champ `template_id` est absent de `$fillable` dans Event : vérifier les écritures directes au modèle. Le Select Filament utilise une relation ; son fonctionnement ne peut pas être déclaré défectueux sur cette seule base.
- Le retour arrière de la migration `add_max_guests_to_events_table` est vide.
- Les dates et indicateurs de GuestTable gagneraient à être castés explicitement ; le fuseau horaire applicatif est UTC. Définir la présentation des heures selon le lieu de l’événement.

## Interface, médias et performances

- Plusieurs modèles Blade autonomes répètent les métadonnées, ressources et formulaires. Mutualiser les composants partagés afin de réduire les divergences.
- Certaines pages francophones déclarent `lang="en"` ou `en-US` ; descriptions SEO répétées et identité « Wedding Manager » encore présente.
- L’image de partage `public/images/wedding-cover.jpg` manque. Plusieurs ressources Venobox et Magnific Popup référencées dans lavewell manquent aussi.
- Une valeur d’intégrité fictive `sha512-...` apparaît pour Font Awesome dans le layout app ; la corriger avec la valeur réelle.
- Le lecteur QR distant est chargé sans version figée et sur le layout de présentation global.
- Les principaux dossiers de ressources publiques totalisent environ 69 Mo sur disque, avec plusieurs collections de thèmes. Ce chiffre n’est pas le poids d’une page téléchargée. Mesurer les pages réellement utilisées avant optimisation.
- Le sélecteur de tables effectue plusieurs requêtes de comptage par table : utiliser des comptages agrégés. Le catalogue de templates charge tous les modèles sans pagination.
- Les formulaires de médias ne précisent pas leur disque. Vérifier la valeur Filament effective et l’alignement avec les vues utilisant `/storage/`, surtout avec `FILESYSTEM_DISK=local`.
- Le lien public/storage existe localement, mais contient un chemin absolu propre à cette machine : le recréer au déploiement.

## Dépendances et exploitation

Laravel 10 n’est plus couvert par les correctifs de sécurité depuis le 4 février 2025, selon la [politique officielle Laravel](https://laravel.com/framework/docs/10.x/releases). Prévoir une migration vers une version prise en charge, avec validation de la compatibilité Filament/Livewire.

Le verrou npm fixe Vite 7.0.0 et laravel-vite-plugin 1.3.0 ; ce plugin déclare Vite 5 ou 6 comme dépendance compatible. Aligner ces versions et vérifier une installation/build reproductible. Aucun build frontend exécuté : Node n’était pas accessible dans le PATH.

Le fichier .env local est en mode local/debug. C’est un constat local, pas une preuve de configuration du serveur public. Il n’est pas suivi par Git. Le déploiement doit servir exclusivement public/, désactiver debug et vérifier HTTPS, sauvegardes et restauration. Le .htaccess racine désactive les règles ModSecurity sur LiteSpeed ; réexaminer cette directive plutôt que la conserver sans justification.

Le README est celui du squelette Laravel ; il manque les instructions propres à Libala : installation, comptes/rôles, configuration médias, rendu PNG, tests et déploiement. Aucune chaîne CI identifiée dans le dépôt examiné.

## Vérifications et limites

Vérifications effectuées :

- Syntaxe PHP : 85 fichiers dans app, routes, database et config, zéro erreur.
- Tests existants : 2 réussis, 2 assertions. Ils couvrent seulement une assertion triviale et HTTP 200 sur l’accueil. Configuration XML PHPUnit signalée comme obsolète.
- composer.json valide et exigences de plateforme Composer satisfaites avec PHP CLI 8.4.21.
- Migrations exécutées avec succès sur SQLite en mémoire, sans connexion à la base métier.
- Reproductions isolées : permissions anonymes permissives, pages admin accessibles, double hachage, arrivée enregistrable sans connexion.
- Vérification statique des ressources locales manquantes et des versions verrouillées.

L’audit de vulnérabilités Composer a été tenté mais a échoué par résolution DNS de Packagist. Aucun bilan exhaustif des vulnérabilités de dépendances ne peut donc être affirmé. Aucune mise à jour de dépendances effectuée.

Pas d’audit du serveur public, de la base réelle, du rendu visuel navigateur, de la caméra mobile, des performances en charge ni de l’envoi effectif WhatsApp. La migration SQLite ne garantit pas à elle seule l’identité du comportement MySQL en production.

## Ordre de correction proposé

1. Fermer l’accès anonyme au panneau et instaurer des droits explicites par rôle et mariage.
2. Corriger les mots de passe, protéger les entrées et lier systématiquement événement/invitation.
3. Fiabiliser validation, unicité, quotas, capacités et concurrence.
4. Ajouter des tests métier : accès anonymes, isolation entre deux mariages, connexion, RSVP, affectation et double scan.
5. Mettre les dépendances à niveau et rendre installation/déploiement reproductibles.
6. Réparer médias, démos et export PNG ; terminer par l’harmonisation visuelle et les mesures de performance.
