<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use App\Models\GuestTable;
use App\Models\Table;

class TemplatePreviewController extends Controller
{
    public function jardin()
    {
        $event = new Event([
            'groom_name' => 'Gabriel',
            'bride_name' => 'Eliana',
            'husband_description' => 'Attentionné et toujours partant pour une nouvelle aventure, Gabriel aime les moments simples et les grandes tablées en famille.',
            'wife_description' => 'Souriante et passionnée, Eliana apporte de la douceur à chaque instant. Elle aime les voyages, les fleurs et les souvenirs que l’on crée ensemble.',
            'wedding_date' => '2027-06-19',
            'civil_commune' => 'La maison communale',
            'civil_date' => '2027-06-18',
            'civil_time' => '14:00',
            'church_name' => 'La chapelle du jardin',
            'church_date' => '2027-06-19',
            'church_time' => '14:30',
            'reception_hall' => 'Le jardin des amoureux',
            'reception_date' => '2027-06-19',
            'reception_time' => '18:00',
            'theme' => 'Élégance naturelle & touches de sauge',
        ]);
        $invitation = new GuestTable;
        $invitation->setRelation('guest', new Guest(['name' => 'Chère famille & chers amis']));
        $invitation->setRelation('table', new Table(['name' => 'Les Magnolias']));

        return view('pages.templates.jardin', [
            'event' => $event,
            'invitation' => $invitation,
            'preview' => true,
        ]);
    }
}
