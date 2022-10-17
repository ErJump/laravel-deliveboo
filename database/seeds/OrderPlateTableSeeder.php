<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Plate;

class OrderPlateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $plates = Plate::all();

        $orders[0]->plates()->attach($plates[0]);
        $orders[1]->plates()->attach($plates[1]);
        $orders[2]->plates()->attach($plates[2]);

    }
}
