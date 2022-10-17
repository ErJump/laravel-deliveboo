<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $order1 = new Order();
        $order1->user_id = 1;
        $order1->first_name = 'Dario';
        $order1->last_name = 'Ropizzi';
        $order1->email = 'dropizzi@gmail.com';
        $order1->phone = '3463399876';
        $order1->comment = 'Il citofono non funziona, chiama quando arrivi';
        $order1->address = 'Via Trinità delle Monache 22';
        $order1->total_price = 18.50;
        $order1->save();

        $order2 = new Order();
        $order2->user_id = 2;
        $order2->first_name = 'Marco';
        $order2->last_name = 'Esposito';
        $order2->email = 'mesposito@gmail.com';
        $order2->phone = '3463488876';
        $order2->comment = '';
        $order2->address = 'Piazzale Tecchio 11';
        $order2->total_price = 28.50;
        $order2->save();

        $order3 = new Order();
        $order3->user_id = 1;
        $order3->first_name = 'Giancarlo';
        $order3->last_name = 'Vannuzzi';
        $order3->email = 'vannuzzi@gmail.com';
        $order3->phone = '3593588876';
        $order3->comment = 'Scala A, ascensore a destra';
        $order3->address = 'Via Luca Giordano 25';
        $order3->total_price = 28.50;
        $order3->save();

        $order4 = new Order();
        $order4->user_id = 3;
        $order4->first_name = 'Sara';
        $order4->last_name = 'Ianoballi';
        $order4->email = 's.balli@gmail.com';
        $order4->phone = '3333588811';
        $order4->comment = "Il palazzo di fronte l'edicola";
        $order4->address = 'Via Maselli 11';
        $order4->total_price = 20.60;
        $order4->save();

    }
}
