<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->restaurant_name = 'Antica Pizzeria da Michele';
        $user1->email = 'info@pizzeriamichele.it';
        $user1->password = Hash::make('damichele');
        $user1->address = 'Via Cesare Sersale 1';
        $user1->p_iva = '91235356543';
        $user1->phone_number = '0815539204';
        $user1->description = 'Pizze margherita e marinara servite tra tavoli di marmo e pareti piastrellate in un piccolo locale vivace.';
        $user1->image = 'https://media-cdn.tripadvisor.com/media/photo-s/1b/1c/b8/58/photo0jpg.jpg';
        $user1->save();

        $user2 = new User();
        $user2->restaurant_name = "McDonald's";
        $user2->email = 'info@mcdonalds.it';
        $user2->password = Hash::make('donald');
        $user2->address = 'Via Giovanni Merliani 38';
        $user2->p_iva = '12244356543';
        $user2->phone_number = '0815539265';
        $user2->description = 'Nota catena di fast food, hamburger e patatine';
        $user2->image = 'https://www.napolitan.it/wp-content/uploads/2021/09/mcdonalds-fast-food-shutterstock.jpg';
        $user2->save();

        $user3 = new User();
        $user3->restaurant_name = "Sushi Zen";
        $user3->email = 'info@sushi.it';
        $user3->password = Hash::make('sushi');
        $user3->address = 'Via Luca Giordano 23';
        $user3->p_iva = '88244356543';
        $user3->phone_number = '0818839265';
        $user3->description = 'Cucina giapponese, ottimo pesce ed ottima carne';
        $user3->image = 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2020/11/tipi-di-sushi-1-1200x675.jpg';
        $user3->save();

        $user4 = new User();
        $user4->restaurant_name = "Iberico";
        $user4->email = 'info@iberico.it';
        $user4->password = Hash::make('spagna');
        $user4->address = 'Traversa San Severino 18';
        $user4->p_iva = '11244356543';
        $user4->phone_number = '0814455265';
        $user4->description = 'Cucina spagnola dal gusto mediterraneo, paella e prosciutti della migliore tradizione iberica';
        $user4->image = 'https://jamonjamonds.com/wp-content/uploads/2019/09/Jamo%CC%81n-Iberico-dettaglio.jpg';
        $user4->save();

        $user5 = new User();
        $user5->restaurant_name = "O' Talebano Kebab";
        $user5->email = 'info@talebano.it';
        $user5->password = Hash::make('spagna');
        $user5->address = 'Via Porta di Massa 8';
        $user5->p_iva = '09874356543';
        $user5->phone_number = '0814455211';
        $user5->description = 'Pita da fast food con carne grigliata in un locale colorato con servizio al bancone da asporto.';
        $user5->image = 'https://www.napolike.it/wp-content/uploads/2022/04/O-Talebano-1-1200x1200.jpg';
        $user5->save();

        $user6 = new User();
        $user6->restaurant_name = "Mi'ndujo";
        $user6->email = 'info@mi_ndujo.it';
        $user6->password = Hash::make("mi'ndujo");
        $user6->address = 'Piazzale San Antonio 18';
        $user6->p_iva = '11244556642';
        $user6->phone_number = '0814456285';
        $user6->description = 'Cucina veloce dal gusto mediterraneo, i migliori panini della zona ';
        $user6->image = 'https://www.radio-food.it/wp-content/uploads/2021/04/mindujo3.jpg';
        $user6->save();

        $user7 = new User();
        $user7->restaurant_name = "Antica Pizza Fritta da Zia Esterina Sorbillo";
        $user7->email = 'info@ziasorbillo.it';
        $user7->password = Hash::make('fritto');
        $user7->address = ' Piazza Trieste e Trento 53';
        $user7->p_iva = '12274386443';
        $user7->phone_number = '0964475265';
        $user7->description = "L'antica pizza fritta, la ricetta originale di zia Esterina!";
        $user7->image = 'https://media-assets.lacucinaitaliana.it/photos/61fbd9f602c559c2ce51b318/16:9/w_2560%2Cc_limit/pizza-fritta-napoletana-800.jpg';
        $user7->save();

        $user8 = new User();
        $user8->restaurant_name = "Taverna del Gatto";
        $user8->email = 'info@tavernadelgatto.it';
        $user8->password = Hash::make('spagna');
        $user8->address = 'Via Roma 72';
        $user8->p_iva = '11255356532';
        $user8->phone_number = '0814561265';
        $user8->description = 'Secondo tradizione romana, le migliori paste e i migliori vini si trovano in questa taverna';
        $user8->image = 'https://media-cdn.tripadvisor.com/media/photo-s/05/2b/b1/0f/la-locanda-del-gatto.jpg';
        $user8->save();

        $user9 = new User();
        $user9->restaurant_name = "Hello Poke";
        $user9->email = 'info@poke.it';
        $user9->password = Hash::make('poke');
        $user9->address = 'Via Michele Kerbaker 37';
        $user9->p_iva = '09555356543';
        $user9->phone_number = '0814455888';
        $user9->description = "Ristorante informale che offre snack e poké hawaiane in un locale semplice con tavoli all'aperto.";
        $user9->image = 'https://static.wixstatic.com/media/224433_04da46ff45ba423c8f7e84b4bd3a5570~mv2.jpg/v1/fill/w_2500,h_1666,al_c/224433_04da46ff45ba423c8f7e84b4bd3a5570~mv2.jpg';
        $user9->save();

        $user10 = new User();
        $user10->restaurant_name = "Thai Restaurant";
        $user10->email = 'info@thairestaurant.it';
        $user10->password = Hash::make('thai');
        $user10->address = 'Via Caccia 72';
        $user10->p_iva = '32257756532';
        $user10->phone_number = '0814487365';
        $user10->description = 'Voglia di cucina asiatica? Mai provato il Thai? Prova i nostri piatti dai sapori unici';
        $user10->image = 'https://www.peninsula.com/-/media/pbk/dining/thiptara/thiptara-hero.jpg?mw=987&hash=1CCEAA8E35683F14E2A42D44400E88EF';
        $user10->save();

        $user11 = new User();
        $user11->restaurant_name = "I Panizzeri";
        $user11->email = 'info@panizzeri.it';
        $user11->password = Hash::make('panizzeri');
        $user11->address = 'via napoli 32';
        $user11->p_iva = '12275386773';
        $user11->phone_number = '1964478265';
        $user11->description = 'Il Panizzo, non è un semplice panino, è una filosofia del mangiare!';
        $user11->image = 'https://www.panizzoromano.it/wp-content/uploads/2018/11/panizzo-2.jpg';
        $user11->save();
    }
}
