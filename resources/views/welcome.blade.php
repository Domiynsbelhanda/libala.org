@extends('layouts.presentation')

@section('title', "Accueil")

@section('content')

    <!-- Home1 Banner Section Start -->
    <div class="home1-banner-section" id="accueil">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1>Libala.org, la solution moderne pour votre mariage</h1>
                        <p>Planifiez facilement votre événement grâce à une plateforme intuitive : gestion des invités, invitations numériques, répartition par table et modèles personnalisés.</p>
                        <div class="button-area">
                            <a href="#fonctionnalite" class="primary-btn" data-text="Nos fonctionnalités"><span>Nos fonctionnalités</span></a>
                            <a href="#tarification" class="video-area video-player">
                                <span>Nos tarifications</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-lg-block d-none">
                    <div class="banner-img magnetic-item">
                        <img src="{{asset('presentation/img/home1/home1-banner-img.png')}}" alt="Illustration du mariage">
                        <div class="customer-counter-area">
                            <div class="icon">
                                <img src="{{asset('presentation/img/home1/icon/home1-customer-counter-icon.svg')}}" alt="Icône client">
                            </div>
                            <div class="content">
                                <div class="number">
                                    <h4 class="counter">100</h4>
                                    <span>+</span>
                                </div>
                                <p>Couples satisfaits</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="home1-banner-bottom-area mb-130">
        <div class="container">
            <div class="row gy-md-5 gy-4">

                <!-- Option 1 : Gestion intelligente des invitations -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <div class="icon">
                            <!-- Icône : enveloppe/invitation -->
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 6L12 13L2 6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <h5>Gestion intelligente des invitations</h5>
                            <p>Créez, envoyez et suivez facilement les invitations numériques personnalisées avec QR code intégré.</p>
                        </div>
                    </div>
                </div>

                <!-- Option 2 : Assignation automatique des invités -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <div class="icon">
                            <!-- Icône : table / sièges -->
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3H21V7H3V3Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 7V21" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18 7V21" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 14H15" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <h5>Assignation automatique des invités</h5>
                            <p>Organisez vos invités par table de manière efficace en fonction de la capacité et des préférences.</p>
                        </div>
                    </div>
                </div>

                <!-- Option 3 : Vérification le jour J -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <div class="icon">
                            <!-- Icône : QR Code (stylisé) -->
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3H9V9H3V3Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 3H21V9H15V3Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3 15H9V21H3V15Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 13H21V21H13V13Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 17H17.01" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <h5>Vérification le jour J</h5>
                            <p>Scannez les codes QR à l’entrée et enregistrez l’heure d’arrivée de chaque invité en temps réel.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Home1 Banner Section End -->

    <!-- Home1 About Section Start -->
    <div class="home1-about-section mb-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-lg-block d-none">
                    <div class="about-img magnetic-item">
                        <img src="{{asset('presentation/img/home1/home1-about-img.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="section-title">
                            <h2>Une solution moderne pour vos événements</h2>
                            <p>Libala.org transforme l’organisation des mariages en une expérience simple, élégante et connectée. Grâce à une plateforme intuitive, vous pouvez gérer vos invités, créer des modèles personnalisés et suivre chaque détail avec précision.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home1 About Section End -->

    <!-- Home1 Service Section Start -->
    <div id="fonctionnalite" class="home1-service-section mb-130">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="section-title text-center">
                        <h2>Nos Fonctionnalités</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-lg-12">
                    <div class="swiper home1-service-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for invitation management -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M12 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/><path d="M6 21v-2a4 4 0 0 1 4-4h4"/><path d="M16 17h.01"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Gestion des invités</h4>
                                        <p>Importez, ajoutez ou modifiez vos invités et suivez leurs confirmations en temps réel.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for templates -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Modèles personnalisables</h4>
                                        <p>Choisissez parmi des modèles élégants pour vos cartes d'invitation numériques et vos pages événementielles.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for table planning -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Planification des tables</h4>
                                        <p>Assignez chaque invité à une table et visualisez facilement la répartition.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for RSVP confirmation -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Confirmation de présence (RSVP)</h4>
                                        <p>Permettez à vos invités de confirmer leur présence en ligne, facilement et rapidement.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for digital access -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 14H3"/><path d="M12 20h.01"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Accès numérique sécurisé</h4>
                                        <p>Chaque invité peut accéder à son invitation grâce à un lien ou un code unique sécurisé.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="service-card">
                                    <div class="icon">
                                        <!-- Icon for analytics -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Statistiques et suivi</h4>
                                        <p>Visualisez en temps réel les statistiques de consultation, de réponse et de participation de vos invités.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-area">
                <div class="swiper-pagination1"></div>
            </div>
        </div>
    </div>
    <!-- Home1 Service Section End -->


    <!-- Home1 Pricing Plan Section Start oklm -->
    <div id="tarification" class="home1-pricing-plan mb-130">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="section-title text-center">
                        <h2>Nos Tarifications</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="pricing-plan-card magnetic-item">
                        <div class="pricing-plan-top">
                            <div class="plan">
                                <h5>Essential +</h5>
                                <span>1 à 100 invitations</span>
                            </div>
                            <div class="price">
                                <h3>$1</h3>
                                <span>Par Invitation</span>
                            </div>
                        </div>
                        <div class="pricing-plan-content">
                            <ul>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Création d'événement
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Envoi d'invitations personnalisées
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Gestion des invités
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Confirmation de présence (RSVP)
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Tableau de bord basique
                                </li>
                            </ul>
                            <a href="https://wa.me/243818045132?text=Bonjour%2C%20je%20souhaite%20commander%20un%20plan%20pour%20mon%20événement%20sur%20Libala.org.%20Merci%20de%20me%20guider%20pour%20choisir%20la%20meilleure%20offre%20selon%20le%20nombre%20d'invités.%20🙏"
                               class="primary-btn black-bg"
                               target="_blank"
                               data-text="Commander">
                                <span>Commander</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="pricing-plan-card professional magnetic-item">
                        <div class="pricing-plan-top">
                            <div class="plan">
                                <h5>Standard</h5>
                                <span>101 à 250 invitations</span>
                            </div>
                            <div class="price">
                                <h3>$0.75</h3>
                                <span>Par Invitation</span>
                            </div>
                        </div>
                        <div class="pricing-plan-content">
                            <ul>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Toutes les fonctionnalités Essentiel +
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Assignation des tables
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Génération de QR Code
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Vérificateur d'invitation
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Personnalisation de l'invitation
                                </li>
                            </ul>
                            <a href="https://wa.me/243818045132?text=Bonjour%2C%20je%20souhaite%20commander%20un%20plan%20pour%20mon%20événement%20sur%20Libala.org.%20Merci%20de%20me%20guider%20pour%20choisir%20la%20meilleure%20offre%20selon%20le%20nombre%20d'invités.%20🙏"
                               class="primary-btn black-bg"
                               target="_blank"
                               data-text="Commander">
                                <span>Commander</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow animate fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="pricing-plan-card magnetic-item">
                        <div class="pricing-plan-top">
                            <div class="plan">
                                <h5>Premium</h5>
                                <span>251 et plus</span>
                            </div>
                            <div class="price">
                                <h3>$0.50</h3>
                                <span>Par Invitation</span>
                            </div>
                        </div>
                        <div class="pricing-plan-content">
                            <ul>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Toutes les fonctionnalités Standard +
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Partage WhatsApp automatique
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Accès aux modèles premium
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Rapports d'arrivée
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Statistiques avancées
                                </li>
                                <li>
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.9426 22.9398C18.0162 22.9398 22.9398 18.0162 22.9398 11.9426C22.9398 5.86895 18.0162 0.945312 11.9426 0.945312C5.86895 0.945312 0.945312 5.86895 0.945312 11.9426C0.945312 18.0162 5.86895 22.9398 11.9426 22.9398Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.55453 11.1681C7.14953 10.8976 6.60852 10.9591 6.27352 11.3131C5.93902 11.6666 5.90752 12.2106 6.20002 12.6001L9.20002 16.6001C9.38102 16.8411 9.66102 16.9881 9.96252 16.9996C10.2635 17.0106 10.554 16.8856 10.7525 16.6586L17.7525 8.65859C18.098 8.26409 18.0795 7.66959 17.7105 7.29659C17.3415 6.92359 16.7475 6.89959 16.349 7.24059L9.92452 12.7476L7.55453 11.1681Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.9423 0.445312C5.59662 0.445312 0.445312 5.59662 0.445312 11.9423C0.445312 18.288 5.59662 23.4393 11.9423 23.4393C18.288 23.4393 23.4393 18.288 23.4393 11.9423C23.4393 5.59662 18.288 0.445312 11.9423 0.445312ZM11.9423 1.44477C17.7361 1.44477 22.4398 6.14853 22.4398 11.9423C22.4398 17.7361 17.7361 22.4398 11.9423 22.4398C6.14853 22.4398 1.44477 17.7361 1.44477 11.9423C1.44477 6.14853 6.14853 1.44477 11.9423 1.44477Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7.83207 10.7521C7.22407 10.3466 6.41258 10.4386 5.91058 10.9691C5.40808 11.5001 5.36158 12.3156 5.80008 12.9001L8.80008 16.9001C9.07158 17.2621 9.49157 17.4821 9.94357 17.4991C10.3956 17.5161 10.8311 17.3281 11.1291 16.9881L18.1291 8.98809C18.6471 8.39559 18.6196 7.50409 18.0661 6.94509C17.5126 6.38559 16.6211 6.34908 16.0241 6.86108L9.88658 12.1216L7.83207 10.7521ZM7.27757 11.5841L9.64708 13.1641C9.83358 13.2881 10.0796 13.2731 10.2501 13.1276L16.6746 7.62058C16.8736 7.44958 17.1711 7.46208 17.3556 7.64858C17.5401 7.83458 17.5491 8.13208 17.3766 8.32958L10.3766 16.3296C10.2771 16.4426 10.1321 16.5056 9.98108 16.4996C9.83058 16.4941 9.69058 16.4206 9.60008 16.3001L6.60008 12.3001C6.45408 12.1051 6.46957 11.8336 6.63707 11.6566C6.80407 11.4796 7.07457 11.4491 7.27757 11.5841Z"/>
                                        </g>
                                    </svg>
                                    Support prioritaire
                                </li>
                            </ul>
                            <a href="https://wa.me/243818045132?text=Bonjour%2C%20je%20souhaite%20commander%20un%20plan%20pour%20mon%20événement%20sur%20Libala.org.%20Merci%20de%20me%20guider%20pour%20choisir%20la%20meilleure%20offre%20selon%20le%20nombre%20d'invités.%20🙏"
                               class="primary-btn black-bg"
                               target="_blank"
                               data-text="Commander">
                                <span>Commander</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home1 Pricing Plan Section End -->
@endsection
