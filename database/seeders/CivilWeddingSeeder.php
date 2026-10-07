<?php
namespace Database\Seeders;

use App\Models\CivilTemplate;
use App\Models\CivilWedding;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilWeddingSeeder extends Seeder
{
    public const NAMES = [
        'Naomi & Mariam', 'Agnès & Tégra', 'Grégory & Marie-Michel', 'Emmanuella',
        'David Kasongoma', 'Glory', 'PRODIGE & Jean-Luc', 'Gracia & Kyria',
        'Elinor & Choukrani', 'Victoire & Cynthia', 'Judith & Ruth', 'Étienne & Andy',
        'Hervé & Sam', 'Albert & Génovique', 'Josh & Danico', 'Patience & Jean-Paul',
        'Vanessa & Clémy', 'Jesse & Kanku', 'Frère Herman', 'Frère Emmanuel',
        'Sœur Dynex', 'Papa Moïse', 'Papa Jeff Tshilumba', 'Couple Oggy Kanda',
        'Tonton Gary', 'Maman Getty', 'Ya Thethe', 'Aurélie Muyumba', 'Maluzu', 'Da Edwige',
    ];

    public function run(): void
    {
        DB::transaction(function () {
            $template = CivilTemplate::firstOrCreate(['key' => 'ambre'], ['name' => 'Jardin d’ambre']);
            $wedding = CivilWedding::where('reference', 'civil-initial-2026')->first();
            if (!$wedding) {
                $wedding = new CivilWedding(['name' => 'Mariage civil à personnaliser', 'civil_template_id' => $template->id]);
                $wedding->reference = 'civil-initial-2026';
                $wedding->save();
            }
            foreach (self::NAMES as $name) {
                $wedding->guests()->firstOrCreate(['name' => $name]);
            }
        });
    }
}
