<?php

use App\Models\Typology;
use App\User;
use Illuminate\Database\Seeder;

class TypologyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $typologies = Typology::all();

        $users[0]->typologies()->attach($typologies[0]);
        $users[1]->typologies()->attach($typologies[8]);
        $users[2]->typologies()->attach($typologies[1]);
        $users[3]->typologies()->attach($typologies[2]);
        $users[4]->typologies()->attach($typologies[10]);
        $users[4]->typologies()->attach($typologies[9]);
        $users[5]->typologies()->attach($typologies[8]);
        $users[6]->typologies()->attach($typologies[0]);
        $users[7]->typologies()->attach($typologies[2]);
        $users[8]->typologies()->attach($typologies[1]);
        $users[9]->typologies()->attach($typologies[5]);
        $users[10]->typologies()->attach($typologies[10]);

    }
}
