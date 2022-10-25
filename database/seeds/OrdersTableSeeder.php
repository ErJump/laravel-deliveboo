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
        $order1->address = 'Via Trinità delle Monache 22';
        $order1->order_list = 'Margherita x1, Capricciosa x2';
        $order1->order_date = '2022-10-21';
        $order1->total_price = 18.50;
        $order1->save();

        $order2 = new Order();
        $order2->user_id = 2;
        $order2->first_name = 'Marco';
        $order2->last_name = 'Esposito';
        $order2->email = 'mesposito@gmail.com';
        $order2->phone = '3463488876';
        $order2->address = 'Piazzale Tecchio 11';
        $order2->order_list = 'Bacon Big Mac x1';
        $order2->order_date = '2022-09-11';
        $order2->total_price = 28.50;
        $order2->save();

        $order3 = new Order();
        $order3->user_id = 1;
        $order3->first_name = 'Giancarlo';
        $order3->last_name = 'Vannuzzi';
        $order3->email = 'vannuzzi@gmail.com';
        $order3->phone = '3593588876';
        $order3->address = 'Via Luca Giordano 25';
        $order3->order_list = 'Capricciosa x1';
        $order3->order_date = '2022-10-10';
        $order3->total_price = 28.50;
        $order3->save();

        $order4 = new Order();
        $order4->user_id = 3;
        $order4->first_name = 'Sara';
        $order4->last_name = 'Ianoballi';
        $order4->email = 's.balli@gmail.com';
        $order4->phone = '3333588811';
        $order4->address = 'Via Maselli 11';
        $order4->order_list = 'Nigiri x8';
        $order4->order_date = '2022-08-25';
        $order4->total_price = 20.60;
        $order4->save();

        $order5 = new Order();
        $order5->user_id = 1;
        $order5->first_name = 'Luca';
        $order5->last_name = 'Spennato';
        $order5->email = 'spennato@gmail.com';
        $order5->phone = '3463379876';
        $order5->address = 'Via Luca dei Luchini 32';
        $order5->order_list = 'Margherita x2';
        $order5->order_date = '2022-09-15';
        $order5->total_price = 18.00;
        $order5->save();
        
        $order6 = new Order();
        $order6->user_id = 1;
        $order6->first_name = 'Celeste';
        $order6->last_name = 'Rami';
        $order6->email = 'ramicel@gmail.com';
        $order6->phone = '2463399876';
        $order6->address = 'Via Roma 10';
        $order6->order_list = 'Margherita x5, Capricciosa x2';
        $order6->order_date = '2022-07-05';
        $order6->total_price = 34.50;
        $order6->save();

        $order7 = new Order();
        $order7->user_id = 1;
        $order7->first_name = 'Giorgio';
        $order7->last_name = 'Napolitano';
        $order7->email = 'giorgionap@gmail.com';
        $order7->phone = '3464499876';
        $order7->address = 'Palazzo Chigi';
        $order7->order_list = 'Margherita x3, Capricciosa x2';
        $order7->order_date = '2022-08-25';
        $order7->total_price = 20.00;
        $order7->save();

        $order8 = new Order();
        $order8->user_id = 1;
        $order8->first_name = 'Simone';
        $order8->last_name = 'Ruzza';
        $order8->email = 'ruzza@gmail.com';
        $order8->phone = '2263399876';
        $order8->address = 'Via dei Prati Fiscali 22';
        $order8->order_list = 'Capricciosa x2';
        $order8->order_date = '2022-04-22';
        $order8->total_price = 10.90;
        $order8->save();

        $order9 = new Order();
        $order9->user_id = 1;
        $order9->first_name = 'Abdul';
        $order9->last_name = 'Hamdulalla';
        $order9->email = 'abhamdulalla@gmail.com';
        $order9->phone = '7493399876';
        $order9->address = 'Piazza Bologna 145';
        $order9->order_list = 'Margherita x6';
        $order9->order_date = '2022-07-14';
        $order9->total_price = 26.50;
        $order9->save();

        $order10 = new Order();
        $order10->user_id = 1;
        $order10->first_name = 'Joe';
        $order10->last_name = 'Denton';
        $order10->email = 'denton@gmail.com';
        $order10->phone = '3463365876';
        $order10->address = 'Via Nazionale 12';
        $order10->order_list = 'Margherita x1';
        $order10->order_date = '2022-08-23';
        $order10->total_price = 6.00;
        $order10->save();

        $order12 = new Order();
        $order12->user_id = 1;
        $order12->first_name = 'Phil';
        $order12->last_name = 'Simons';
        $order12->email = 'dsimons@gmail.com';
        $order12->phone = '3468999876';
        $order12->address = 'Via Ancona 12';
        $order12->order_list = 'Capricciosa x4';
        $order12->order_date = '2022-08-23';
        $order12->total_price = 25.50;
        $order12->save();

        $order13 = new Order();
        $order13->user_id = 1;
        $order13->first_name = 'Giorgia';
        $order13->last_name = 'Rossi';
        $order13->email = 'rossig@gmail.com';
        $order13->phone = '4566339987';
        $order13->address = 'Via Trinità delle Monache 22';
        $order13->order_list = 'Margherita x1, Capricciosa x2';
        $order13->order_date = '2022-08-21';
        $order13->total_price = 18.50;
        $order13->save();

        $order14 = new Order();
        $order14->user_id = 1;
        $order14->first_name = 'Mario';
        $order14->last_name = 'Bianchi';
        $order14->email = 'bianchimario@gmail.com';
        $order14->phone = '3463399789';
        $order14->address = 'Via Alessandria 2';
        $order14->order_list = 'Margherita x2';
        $order14->order_date = '2022-05-11';
        $order14->total_price = 10.50;
        $order14->save();

        $order15 = new Order();
        $order15->user_id = 1;
        $order15->first_name = 'Andrea';
        $order15->last_name = 'Leoni';
        $order15->email = 'andrealeoni@gmail.com';
        $order15->phone = '3966339987';
        $order15->address = 'Via delle marche';
        $order15->order_list = 'Margherita x3';
        $order15->order_date = '2022-06-27';
        $order15->total_price = 16.50;
        $order15->save();

        $order16 = new Order();
        $order16->user_id = 1;
        $order16->first_name = 'Valerio';
        $order16->last_name = 'Volpieschi';
        $order16->email = 'volpivale@gmail.com';
        $order16->phone = '3462269789';
        $order16->address = 'Via Alessandria 12';
        $order16->order_list = 'Margherita x4';
        $order16->order_date = '2022-01-31';
        $order16->total_price = 22.50;
        $order16->save();

        $order17 = new Order();
        $order17->user_id = 1;
        $order17->first_name = 'Saverio';
        $order17->last_name = 'Andrei';
        $order17->email = 'saverio@gmail.com';
        $order17->phone = '3467899789';
        $order17->address = 'Via Lucani 12';
        $order17->order_list = 'Capricciosa x3';
        $order17->order_date = '2022-06-10';
        $order17->total_price = 17.00;
        $order17->save();

        $order18 = new Order();
        $order18->user_id = 1;
        $order18->first_name = 'Alessandro';
        $order18->last_name = 'Pietrucci';
        $order18->email = 'alepietrucci@gmail.com';
        $order18->phone = '3462294789';
        $order18->address = 'Via Rossi 72';
        $order18->order_list = 'Margherita x7';
        $order18->order_date = '2022-06-04';
        $order18->total_price = 45.50;
        $order18->save();

        $order19 = new Order();
        $order19->user_id = 1;
        $order19->first_name = 'Luca';
        $order19->last_name = 'Rossini';
        $order19->email = 'rossini@gmail.com';
        $order19->phone = '4566699789';
        $order19->address = 'Piazza del Trionfo 60';
        $order19->order_list = 'Margherita x4';
        $order19->order_date = '2022-04-21';
        $order19->total_price = 35.60;
        $order19->save();

        $order20 = new Order();
        $order20->user_id = 1;
        $order20->first_name = 'Alessandro';
        $order20->last_name = 'Scafato';
        $order20->email = 'alescaf@gmail.com';
        $order20->phone = '1262294789';
        $order20->address = 'Via Rossastri 34';
        $order20->order_list = 'Margherita x7';
        $order20->order_date = '2022-06-04';
        $order20->total_price = 45.50;
        $order20->save();

        $order21 = new Order();
        $order21->user_id = 1;
        $order21->first_name = 'Antonio';
        $order21->last_name = 'Vendetta';
        $order21->email = 'vendetta@gmail.com';
        $order21->phone = '4566699789';
        $order21->address = 'Piazza del Trionfo 78';
        $order21->order_list = 'Margherita x4, Capricciosa x2';
        $order21->order_date = '2022-02-08';
        $order21->total_price = 40.20;
        $order21->save();

        $order22 = new Order();
        $order22->user_id = 1;
        $order22->first_name = 'Lorenzo';
        $order22->last_name = 'Branzini';
        $order22->email = 'lollobranz@gmail.com';
        $order22->phone = '7866699789';
        $order22->address = 'Piazza dei pesci 45';
        $order22->order_list = 'Margherita x1, Capricciosa x2';
        $order22->order_date = '2022-03-22';
        $order22->total_price = 25.20;
        $order22->save();

        $order23 = new Order();
        $order23->user_id = 1;
        $order23->first_name = 'Orazio';
        $order23->last_name = 'Villa';
        $order23->email = 'oravilla@gmail.com';
        $order23->phone = '7766299789';
        $order23->address = 'Via degli Archi Vittoriosi 5';
        $order23->order_list = 'Capricciosa x2';
        $order23->order_date = '2022-03-22';
        $order23->total_price = 12.20;
        $order23->save();

        $order24 = new Order();
        $order24->user_id = 1;
        $order24->first_name = 'Patrizio';
        $order24->last_name = 'Ferrari';
        $order24->email = 'PatriFerra@gmail.com';
        $order24->phone = '1166299789';
        $order24->address = 'Via Ponza Marittima 720';
        $order24->order_list = 'Capricciosa x1';
        $order24->order_date = '2022-07-05';
        $order24->total_price = 7.00;
        $order24->save();

        $order25 = new Order();
        $order25->user_id = 1;
        $order25->first_name = 'Ernesto';
        $order25->last_name = 'Cipro';
        $order25->email = 'ciproer@gmail.com';
        $order25->phone = '1166298789';
        $order25->address = 'Via lugano 20';
        $order25->order_list = 'Capricciosa x3';
        $order25->order_date = '2022-07-18';
        $order25->total_price = 15.50;
        $order25->save();
    }
}

