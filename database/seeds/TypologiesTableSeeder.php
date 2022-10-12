<?php

use App\Models\Typology;
use Illuminate\Database\Seeder;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $typologies = [
            'pizzeria',
            'sushi',
            'trattoria',
            'fusion',
            'vegan',
            'taiwanese',
            'indiano',
            'cinese',
            'fast food',
            'vegetariano',
        ];

        foreach ($typologies as $typology) {
            $newTypology = new Typology();
            $newTypology->name = $typology;
            $newTypology->save();
        }
    }
}
