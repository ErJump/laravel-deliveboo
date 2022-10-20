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
        $user1->name = 'Antica Pizzeria da Michele';
        $user1->email = 'info@pizzeriamichele.it';
        $user1->password = Hash::make('damichele');
        $user1->address = 'Via Cesare Sersale 1';
        $user1->p_iva = '91235356543';
        $user1->phone_number = '0815539204';
        $user1->description = 'Pizze margherita e marinara servite tra tavoli di marmo e pareti piastrellate in un piccolo locale vivace.';
        $user1->image = 'https://media-cdn.tripadvisor.com/media/photo-s/1b/1c/b8/58/photo0jpg.jpg';
        $user1->save();

        $user2 = new User();
        $user2->name = "McDonald's";
        $user2->email = 'info@mcdonalds.it';
        $user2->password = Hash::make('donald');
        $user2->address = 'Via Giovanni Merliani 38';
        $user2->p_iva = '12244356543';
        $user2->phone_number = '0815539265';
        $user2->description = 'Nota catena di fast food, hamburger e patatine';
        $user2->image = 'https://www.napolitan.it/wp-content/uploads/2021/09/mcdonalds-fast-food-shutterstock.jpg';
        $user2->save();

        $user3 = new User();
        $user3->name = "Sushi Zen";
        $user3->email = 'info@sushi.it';
        $user3->password = Hash::make('sushi');
        $user3->address = 'Via Luca Giordano 23';
        $user3->p_iva = '88244356543';
        $user3->phone_number = '0818839265';
        $user3->description = 'Cucina giapponese, ottimo pesce ed ottima carne';
        $user3->image = 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2020/11/tipi-di-sushi-1-1200x675.jpg';
        $user3->save();

        $user4 = new User();
        $user4->name = "Iberico";
        $user4->email = 'info@iberico.it';
        $user4->password = Hash::make('spagna');
        $user4->address = 'Traversa San Severino 18';
        $user4->p_iva = '11244356543';
        $user4->phone_number = '0814455265';
        $user4->description = 'Cucina spagnola dal gusto mediterraneo, paella e prosciutti della migliore tradizione iberica';
        $user4->image = 'https://jamonjamonds.com/wp-content/uploads/2019/09/Jamo%CC%81n-Iberico-dettaglio.jpg';
        $user4->save();

        $user5 = new User();
        $user5->name = "O' Talebano Kebab";
        $user5->email = 'info@talebano.it';
        $user5->password = Hash::make('spagna');
        $user5->address = 'Via Porta di Massa 8';
        $user5->p_iva = '09874356543';
        $user5->phone_number = '0814455211';
        $user5->description = 'Pita da fast food con carne grigliata in un locale colorato con servizio al bancone da asporto.';
        $user5->image = 'https://www.napolike.it/wp-content/uploads/2022/04/O-Talebano-1-1200x1200.jpg';
        $user5->save();

        $user6 = new User();
        $user6->name = "Mi'ndujo";
        $user6->email = 'info@mi_ndujo.it';
        $user6->password = Hash::make("mi'ndujo");
        $user6->address = 'Piazzale San Antonio 18';
        $user6->p_iva = '11244556642';
        $user6->phone_number = '0814456285';
        $user6->description = 'Cucina veloce dal gusto mediterraneo, i migliori panini della zona ';
        $user6->image = 'https://www.radio-food.it/wp-content/uploads/2021/04/mindujo3.jpg';
        $user6->save();

        $user7 = new User();
        $user7->name = "Antica Pizza Fritta da Zia Esterina Sorbillo";
        $user7->email = 'info@ziasorbillo.it';
        $user7->password = Hash::make('fritto');
        $user7->address = ' Piazza Trieste e Trento 53';
        $user7->p_iva = '12274386443';
        $user7->phone_number = '0964475265';
        $user7->description = "L'antica pizza fritta, la ricetta originale di zia Esterina!";
        $user7->image = 'https://media-assets.lacucinaitaliana.it/photos/61fbd9f602c559c2ce51b318/16:9/w_2560%2Cc_limit/pizza-fritta-napoletana-800.jpg';
        $user7->save();

        $user8 = new User();
        $user8->name = "Taverna del Gatto";
        $user8->email = 'info@tavernadelgatto.it';
        $user8->password = Hash::make('spagna');
        $user8->address = 'Via Roma 72';
        $user8->p_iva = '11255356532';
        $user8->phone_number = '0814561265';
        $user8->description = 'Secondo tradizione romana, le migliori paste e i migliori vini si trovano in questa taverna';
        $user8->image = 'https://media-cdn.tripadvisor.com/media/photo-s/05/2b/b1/0f/la-locanda-del-gatto.jpg';
        $user8->save();

        $user9 = new User();
        $user9->name = "Hello Poke";
        $user9->email = 'info@poke.it';
        $user9->password = Hash::make('poke');
        $user9->address = 'Via Michele Kerbaker 37';
        $user9->p_iva = '09555356543';
        $user9->phone_number = '0814455888';
        $user9->description = "Ristorante informale che offre snack e poké hawaiane in un locale semplice con tavoli all'aperto.";
        $user9->image = 'https://static.wixstatic.com/media/224433_04da46ff45ba423c8f7e84b4bd3a5570~mv2.jpg/v1/fill/w_2500,h_1666,al_c/224433_04da46ff45ba423c8f7e84b4bd3a5570~mv2.jpg';
        $user9->save();

        $user10 = new User();
        $user10->name = "Thai Restaurant";
        $user10->email = 'info@thairestaurant.it';
        $user10->password = Hash::make('thai');
        $user10->address = 'Via Caccia 72';
        $user10->p_iva = '32257756532';
        $user10->phone_number = '0814487365';
        $user10->description = 'Voglia di cucina asiatica? Mai provato il Thai? Prova i nostri piatti dai sapori unici';
        $user10->image = 'https://www.peninsula.com/-/media/pbk/dining/thiptara/thiptara-hero.jpg?mw=987&hash=1CCEAA8E35683F14E2A42D44400E88EF';
        $user10->save();

        $user11 = new User();
        $user11->name = "I Panizzeri";
        $user11->email = 'info@panizzeri.it';
        $user11->password = Hash::make('panizzeri');
        $user11->address = 'via napoli 32';
        $user11->p_iva = '12275386773';
        $user11->phone_number = '1964478265';
        $user11->description = 'Il Panizzo, non è un semplice panino, è una filosofia del mangiare!';
        $user11->image = 'https://www.panizzoromano.it/wp-content/uploads/2018/11/panizzo-2.jpg';
        $user11->save();

        $user12 = new User();
        $user12->name = "Il Giardino del Cibo";
        $user12->email = 'info@giardino.it';
        $user12->password = Hash::make('giardino');
        $user12->address = 'via stocca 33';
        $user12->p_iva = '12375385773';
        $user12->phone_number = '1968438265';
        $user12->description = 'Il nostro non è un semplice ristorane vegano, ti permetterà di scoprire sapori e esperienze mia provate prima!';
        $user12->image = 'https://www.ansa.it/webimages/foto_large_ls_350/2017/4/19/74f40cc14481d553811efd2f36ee72b5.jpg';
        $user12->save();

        $user13 = new User();
        $user13->name = "Appetitofu";
        $user13->email = 'info@Appetitofu.it';
        $user13->password = Hash::make('Appetitofu');
        $user13->address = 'pazza del popolo';
        $user13->p_iva = '10000000123';
        $user13->phone_number = '1964478123';
        $user13->description = 'Iistorante innovativo, pro al mangiare sano e mangiare bene';
        $user13->image = 'https://www.vegolosi.it/wp-content/uploads/2018/05/Cuculia-Firenze.jpg';
        $user13->save();

        $user14 = new User();
        $user14->name = "Pausa Vegana";
        $user14->email = 'info@vegana.it';
        $user14->password = Hash::make('vegana');
        $user14->address = "via passo d'uomo 34";
        $user14->p_iva = '10000000234';
        $user14->phone_number = '1964478234';
        $user14->description = 'Ottimo ristorante che fornisce un ampio catalogo di piatti sfiziosi tutti vegani';
        $user14->image = 'https://www.latitudeslife.com/wp-content/uploads/hamburger-2856548_960_720-e1520434123437.jpg';
        $user14->save();

        $user15 = new User();
        $user15->name = "Curry & Cumino";
        $user15->email = 'info@curry.it';
        $user15->password = Hash::make('curry');
        $user15->address = 'via lucozzi 56';
        $user15->p_iva = '12275386345';
        $user15->phone_number = '1964478345';
        $user15->description = 'Il miglior curry indiano di napoli';
        $user15->image = 'https://cucinareoggi.com/wp-content/uploads/2021/10/Photo-1.jpg';
        $user15->save();

        $user16 = new User();
        $user16->name = "Area Samosa";
        $user16->email = 'info@samosa.it';
        $user16->password = Hash::make('samosa');
        $user16->address = 'via castovilli 32';
        $user16->p_iva = '12275386456';
        $user16->phone_number = '1964478456';
        $user16->description = 'Il samosa , non è un semplice piatto indiano, è una filosofia del mangiare!';
        $user16->image = 'https://media-cdn.tripadvisor.com/media/photo-s/0c/bc/e8/15/ristorante-indiano-gandhi.jpg';
        $user16->save();

        $user17 = new User();
        $user17->name = "La Dimora del Tandoor";
        $user17->email = 'info@tandoor.it';
        $user17->password = Hash::make('tandoor');
        $user17->address = 'via snopoti 6';
        $user17->p_iva = '12275386567';
        $user17->phone_number = '1964478567';
        $user17->description = 'cibo caratteristico indiano, tramandato da generazione in generazione';
        $user17->image = 'https://www.guidatorino.com/wp-content/uploads/2015/05/ristoranti-indiani-torino.jpg';
        $user17->save();

        $user18 = new User();
        $user18->name = "	Fujian Bambù";
        $user18->email = 'info@Bambù.it';
        $user18->password = Hash::make('Bambù');
        $user18->address = 'via car 77';
        $user18->p_iva = '12275386678';
        $user18->phone_number = '1964478678';
        $user18->description = 'Voglia di cucina asiatica? Mai provato il Cinese? Prova i nostri piatti dai sapori unici';
        $user18->image = 'https://wips.plug.it/cips/paginegialle.it/magazine/cms/2022/04/cucina-cinese.jpg';
        $user18->save();

        $user19 = new User();
        $user19->name = "Hen Haochi Bistrò";
        $user19->email = 'info@haochi.it';
        $user19->password = Hash::make('haochi');
        $user19->address = 'via gianni 32';
        $user19->p_iva = '12275386789';
        $user19->phone_number = '1964478789';
        $user19->description = 'cibo caratteristico cinese, tramandato da generazione in generazione';
        $user19->image = 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/2022-08/ristoranti-cinesi-roma-Song.jpg';
        $user19->save();

        $user20 = new User();
        $user20->name = "Raviolincina";
        $user20->email = 'info@raviolincina.it';
        $user20->password = Hash::make('raviolincina');
        $user20->address = 'via castro 32';
        $user20->p_iva = '12275386890';
        $user20->phone_number = '1964478890';
        $user20->description = 'I ravioli, non sono un semplice paso, è una filosofia del mangiare!';
        $user20->image = 'https://www.napolitoday.it/~media/horizontal-hi/7847824910662/copertina-cucina-cinese-2.jpg';
        $user20->save();

    }
}
