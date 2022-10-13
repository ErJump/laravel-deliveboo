<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypologiesTableSeeder::class);
        $this->call(TypologyUserTableSeeder::class);
        $this->call(PlatesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
