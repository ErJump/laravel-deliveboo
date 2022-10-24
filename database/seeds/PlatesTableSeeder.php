<?php

use App\Models\Plate;
use Illuminate\Database\Seeder;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plate1 = new Plate();
        $plate1->name = 'Margherita';
        $plate1->user_id = 1;
        $plate1->ingredients = 'Pomodoro, mozzarella, basilico';
        $plate1->description = "L'originale pizza margherita di Napoli";
        $plate1->price = 4.50;
        $plate1->discount = 0;
        $plate1->availability = true;
        $plate1->image = 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/4/2015/03/pizza-margherita-dop-napoli.jpg';
        $plate1->save();

        $plate2 = new Plate();
        $plate2->name = 'Capricciosa';
        $plate2->user_id = 1;
        $plate2->ingredients = "Pomodoro, mozzarella, prosciutto cotto, funghi champignon, carciofini sott'olio, formaggio, basilico e olio";
        $plate2->description = "Una pizza ottima per i prodotti del territorio";
        $plate2->price = 6.00;
        $plate2->discount = 0;
        $plate2->availability = false;
        $plate2->image = 'https://www.melarossa.it/wp-content/uploads/2021/02/pizza-capricciosa.jpg';
        $plate2->save();

        $plate3 = new Plate();
        $plate3->name = '4 stagioni';
        $plate3->user_id = 1;
        $plate3->ingredients = 'Pomodoro, mozzarella, prosciutto cotto, salame Napoli, funghi champignon, formaggio, basilico e olio';
        $plate3->description = "Ottima pizza per i chienti più esigenti";
        $plate3->price = 6.0;
        $plate3->discount = 10;
        $plate3->availability = true;
        $plate3->image = 'https://primochef.it/wp-content/uploads/2020/04/SH_pizza_quattro_stagioni.jpg';
        $plate3->save();

        $plate4 = new Plate();
        $plate4->name = 'Nigiri';
        $plate4->user_id = 3;
        $plate4->ingredients = "riso, salmone e wasabi";
        $plate4->description = "Il nigiri equilibrio tra quantità di riso e pesce. ";
        $plate4->price = 6;
        $plate4->discount = 10;
        $plate4->availability = 1;
        $plate4->image = 'https://www.giallozafferano.it/images/225-22503/Nigiri_450x300.jpg';
        $plate4->save();

        $plate5 = new Plate();
        $plate5->name = 'Gamberi tempura';
        $plate5->user_id = 3;
        $plate5->ingredients = "gamberi";
        $plate5->description = "La tempura è uno dei piatti più conosciuti e amati della cucina del Sol Levante";
        $plate5->price = 6;
        $plate5->discount = 5;
        $plate5->availability = 1;
        $plate5->image = 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/styles/recipes_1200_800_fallback/public/fdl_content_import_it/tempura-di-gamberi.jpg?itok=-JjFZyK8';
        $plate5->save();

        $plate6 = new Plate();
        $plate6->name = 'Sashimi';
        $plate6->user_id = 3;
        $plate6->ingredients = "salmone, tonno e branzino";
        $plate6->description = "Il sashimi è una ricetta giapponese che rientra nel gruppo del sushi";
        $plate6->price = 8;
        $plate6->discount = 0;
        $plate6->availability = 1;
        $plate6->image = 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2019/10/iStock-1149200856-1200x675.jpg';
        $plate6->save();

        $plate7 = new Plate();
        $plate7->name = 'prosciutto spagnolo';
        $plate7->user_id = 4;
        $plate7->ingredients = "jamon";
        $plate7->description = "Il Jamón ibérico o prosciutto di razza iberica.";
        $plate7->price = 10;
        $plate7->discount = 0;
        $plate7->availability = 1;
        $plate7->image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Jam%C3%B3n_de_Guijuelo_004_%28cropped%29_4.3.JPG/800px-Jam%C3%B3n_de_Guijuelo_004_%28cropped%29_4.3.JPG';
        $plate7->save();

        $plate8 = new Plate();
        $plate8->name = 'Paella';
        $plate8->user_id = 4;
        $plate8->ingredients = "riso e frutti di mare";
        $plate8->description = "La paella è un piatto tradizionale della cucina spagnola a base di riso, zafferano e frutti di mare.";
        $plate8->price = 12;
        $plate8->discount = 5;
        $plate8->availability = 1;
        $plate8->image = 'https://www.tavolartegusto.it/wp/wp-content/uploads/2019/08/paella-Ricetta-paella-di-pesce-paella-de-mariscos-.jpg';
        $plate8->save();

        $plate9 = new Plate();
        $plate9->name = 'Churros';
        $plate9->user_id = 4;
        $plate9->ingredients = "farina, acqua e zucchero";
        $plate9->description = "ll churro è un dolce dalla forma cilindrica ed allungata";
        $plate9->price = 4;
        $plate9->discount = 0;
        $plate9->availability = 1;
        $plate9->image = 'https://www.giallozafferano.it/images/242-24299/Churros_650x433_wm.jpg';
        $plate9->save();

        $plate10 = new Plate();
        $plate10->name = 'kebab classico';
        $plate10->user_id = 5;
        $plate10->ingredients = "piadina, carne e verdure";
        $plate10->description = "kebab classico della tradizione mediorentale";
        $plate10->price = 7;
        $plate10->discount = 0;
        $plate10->availability = 1;
        $plate10->image = 'https://s3-eu-west-1.amazonaws.com/o2overticaldata/pictures/2021/11/2000430/012fbfe5a6c51767.jpg';
        $plate10->save();

        $plate11 = new Plate();
        $plate11->name = 'kebab gourmet 1';
        $plate11->user_id = 5;
        $plate11->ingredients = "kebab con mozzarella";
        $plate11->description = "kebab con classici ingredienti della tradizione campana";
        $plate11->price = 7;
        $plate11->discount = 0;
        $plate11->availability = 1;
        $plate11->image = 'https://www.lagazzettadeisapori.it/wp-content/uploads/2022/04/WhatsApp-Image-2022-04-22-at-16.14.53-2.jpeg';
        $plate11->save();

        $plate12 = new Plate();
        $plate12->name = 'kebab gourmet 2';
        $plate12->user_id = 5;
        $plate12->ingredients = "kebab di pollo, bacon e cheddar";
        $plate12->description = "una moderna rivisitazione del kebab";
        $plate12->price = 7;
        $plate12->discount = 0;
        $plate12->availability = 1;
        $plate12->image = 'https://d1ralsognjng37.cloudfront.net/f00b5baa-275c-4b27-a8b3-30d5b66c399b';
        $plate12->save();

        $plate13 = new Plate();
        $plate13->name = 'Ghiotto';
        $plate13->user_id = 6;
        $plate13->ingredients = "Pane appena sfornato, Prosciutto crudo az. Madeo, Mozzarella di latte di bufala, Pomodorini. ";
        $plate13->description = "Pane appena sfornato, Prosciutto crudo az. Madeo, Mozzarella di latte di bufala, Pomodorini. ";
        $plate13->price = 8;
        $plate13->discount = 10;
        $plate13->availability = 1;
        $plate13->image = 'https://www.mindujo.it/wp-content/uploads/2022/02/caff2b20-4f1e-4642-bbdf-0321e1290cfca-4.jpg';
        $plate13->save();


        $plate14 = new Plate();
        $plate14->name = 'Arcomagno';
        $plate14->user_id = 6;
        $plate14->ingredients = "Pane sfornato a vista, Hamburger di pollo, Caciocavallo, Prosciutto Crudo, Radicchio, Lattuga, Limone, Maionese";
        $plate14->description = "Pane sfornato a vista, Hamburger di pollo, Caciocavallo, Prosciutto Crudo, Radicchio, Lattuga, Limone, Maionese";
        $plate14->price = 11;
        $plate14->discount = 0;
        $plate14->availability = 1;
        $plate14->image = 'https://www.mindujo.it/wp-content/uploads/2022/06/cf5ca2ef-0a4e-4339-abbe-f92033edf000-4.jpg';
        $plate14->save();

        $plate15 = new Plate();
        $plate15->name = 'Mi ndujo';
        $plate15->user_id = 6;
        $plate15->ingredients = "Pane appena sfornato, Salsiccia, Caciocavallo tutto latte, ‘Nduja di Spilinga, Patate.";
        $plate15->description = "Pane appena sfornato, Salsiccia, Caciocavallo tutto latte, ‘Nduja di Spilinga, Patate.";
        $plate15->price = 10;
        $plate15->discount = 5;
        $plate15->availability = 1;
        $plate15->image = 'https://www.mindujo.it/wp-content/uploads/2022/02/94c2151e-617b-4d2b-938e-5e3ac7f8be90-4.jpg';
        $plate15->save();

        $plate16 = new Plate();
        $plate16->name = 'Completa con il salame';
        $plate16->user_id = 7;
        $plate16->ingredients = "ricotta, salame, provola e pomodoro ";
        $plate16->description = "tradizionale pizza fritta napoletana";
        $plate16->price = 4;
        $plate16->discount =0;
        $plate16->availability = 1;
        $plate16->image = 'https://www.scattidigusto.it/wp-content/uploads/2019/06/pizza-fritta-Sorbillo-Zia-Esterina-recensione.jpg';
        $plate16->save();


        $plate17 = new Plate();
        $plate17->name = 'Pizza fritta con il segreto';
        $plate17->user_id = 7;
        $plate17->ingredients = "pizza fritta con il segreto";
        $plate17->description = "tradizionale pizza fritta napoletana";
        $plate17->price = 4;
        $plate17->discount = 0;
        $plate17->availability = 1;
        $plate17->image = 'https://www.scattidigusto.it/wp-content/uploads/2019/06/pizza-fritta-Sorbillo-Zia-Esterina-recensione.jpg';
        $plate17->save();

        $plate18 = new Plate();
        $plate18->name = 'Fritto con provola';
        $plate18->user_id = 7;
        $plate18->ingredients = "Provola, pomodoro e pepe";
        $plate18->description = "tradizionale pizza fritta napoletana";
        $plate18->price = 4;
        $plate18->discount = 0;
        $plate18->availability = 1;
        $plate18->image = 'https://www.scattidigusto.it/wp-content/uploads/2019/06/pizza-fritta-Sorbillo-Zia-Esterina-recensione.jpg';
        $plate18->save();

        $plate19 = new Plate();
        $plate19->name = 'Carbonara';
        $plate19->user_id = 8;
        $plate19->ingredients = "pasta, uova, pecorino, guanciale e pepe";
        $plate19->description = "tradizionale piatto della cucina romana";
        $plate19->price = 10;
        $plate19->discount =5;
        $plate19->availability = 1;
        $plate19->image = 'https://blog.giallozafferano.it/dulcisinforno/wp-content/uploads/2021/03/Carbonara-ricetta-5328.jpg';
        $plate19->save();


        $plate20 = new Plate();
        $plate20->name = 'Cacio e pepe';
        $plate20->user_id = 8;
        $plate20->ingredients = "Pasta, pecorino e pepe";
        $plate20->description = "tradizionale piatto della cucina romana";
        $plate20->price = 10;
        $plate20->discount = 10;
        $plate20->availability = 1;
        $plate20->image = 'https://blog.giallozafferano.it/dulcisinforno/wp-content/uploads/2021/01/Pasta-cacio-e-pepe-2634.jpg';
        $plate20->save();

        $plate21 = new Plate();
        $plate21->name = 'Amatriciana';
        $plate21->user_id = 8;
        $plate21->ingredients = "pasta, pomodori, pecorino, guanciale, olio e pepe";
        $plate21->description = "tradizionale piatto della cucina di Amatrice";
        $plate21->price = 10;
        $plate21->discount = 0;
        $plate21->availability = 1;
        $plate21->image = 'https://www.tavolartegusto.it/wp/wp-content/uploads/2022/04/Amatriciana.jpg';
        $plate21->save();

        $plate22 = new Plate();
        $plate22->name = 'Abiya poke';
        $plate22->user_id = 9;
        $plate22->ingredients = "Riso sushi, soia, salmone, avocado, alghe, edamame, teriyaki, semi mix";
        $plate22->description = "tradizionale piatto hawaiano a base di pesce crudo marinato";
        $plate22->price = 12;
        $plate22->discount =0;
        $plate22->availability = 1;
        $plate22->image = 'https://blog.giallozafferano.it/dulcisinforno/wp-content/uploads/2021/06/Poke-bowl-ricetta-7893.jpg';
        $plate22->save();


        $plate23 = new Plate();
        $plate23->name = 'Umaira poke';
        $plate23->user_id = 9;
        $plate23->ingredients = "Riso sushi, soia, tonno, edamame, tofu, spicy mayo, semi mix";
        $plate23->description = "tradizionale piatto hawaiano a base di pesce crudo marinato";
        $plate23->price = 13;
        $plate23->discount = 10;
        $plate23->availability = 1;
        $plate23->image = 'https://www.fattoincasadabenedetta.it/wp-content/uploads/2022/05/Poke-Bowl-Vegano-IG-1-1010x1024.jpg';
        $plate23->save();

        $plate24 = new Plate();
        $plate24->name = 'Gullu poke';
        $plate24->user_id = 9;
        $plate24->ingredients = "Riso sushi, soia, salmone cotto, gamberi cotti, cipolla crispy, avocado, pomodorini, salsa rosa, semi mix";
        $plate24->description = "tradizionale piatto hawaiano a base di pesce crudo marinato";
        $plate24->price = 11;
        $plate24->discount = 0;
        $plate24->availability = 1;
        $plate24->image = 'https://cdn.ilclubdellericette.it/wp-content/uploads/2022/05/ricetta-poke-bowl-al-tonno-e-mango-1280x720.jpg';
        $plate24->save();

        $plate25 = new Plate();
        $plate25->name = 'Bacon Big Mac';
        $plate25->user_id = 2;
        $plate25->ingredients = "Pane, Carne Bovina, Becon, Formaggio, salsa Big Mac, Insalata, Cipolla, Cetriolo";
        $plate25->description = "Prova a resistere al gusto unico di Big Mac®, arricchito da uno strato di croccante bacon 100% da pancetta italiana";
        $plate25->price = 10;
        $plate25->discount = 0;
        $plate25->availability = 1;
        $plate25->image = 'https://www.mcdonalds.it/sites/default/files/styles/compressed/public/products/bacon-big-mac--hero-mob.jpg.webp?itok=_PRdIvZC';
        $plate25->save();

        $plate26 = new Plate();
        $plate26->name = 'Chicken Big Mac';
        $plate26->user_id = 2;
        $plate26->ingredients = "Pane, Petto di pollo, Formaggio, salsa Big Mac, Insalata, Cetriolo";
        $plate26->description = "Anche i classici sono pronti a stupirti di nuovo! Lasciati sorprendere dal gusto inconfondibile di Big Mac®, ora anche in versione Chicken";
        $plate26->price = 10;
        $plate26->discount = 0;
        $plate26->availability = 1;
        $plate26->image = 'https://www.mcdonalds.it/sites/default/files/styles/compressed/public/products/chicken-big-mac--hero-mob.jpg.webp?itok=ODWehcOs';
        $plate26->save();

        $plate27 = new Plate();
        $plate27->name = 'Crispy McWrap';
        $plate27->user_id = 2;
        $plate27->ingredients = "Tortilla, Carne Bovina, Becon, Formaggio, salsa Crispy, Insalata, ";
        $plate27->description = "Carne 100% bovina da allevamenti italiani, croccante bacon 100% da pancetta italiana, formaggio e l’inconfondibile salsa, avvolti in una fragrante tortilla.";
        $plate27->price = 10;
        $plate27->discount = 0;
        $plate27->availability = 1;
        $plate27->image = 'https://www.mcdonalds.it/sites/default/files/products/meta/mcwrap_meta.jpg';
        $plate27->save();

        $plate28 = new Plate();
        $plate28->name = 'Pad thai';
        $plate28->user_id = 10;
        $plate28->ingredients = "Tagliatelle di riso, uovo, tofu fritto, gamberi, cipollotto, mix di verdure, salsa pad thai, arachidi, lime";
        $plate28->description = "Tradizionale piatto della cucina Thai";
        $plate28->price = 9;
        $plate28->discount = 0;
        $plate28->availability = 1;
        $plate28->image = 'https://www.giallozafferano.it/images/176-17699/Pad-thai_780x520_wm.jpg';
        $plate28->save();

        $plate29 = new Plate();
        $plate29->name = 'Noodle4';
        $plate29->user_id = 10;
        $plate29->ingredients = "Mix di verdure, uovo, manzo, peperoni, germogli di soia, salsa chili paste";
        $plate29->description = "Un esplosione di gusti Thai tutti per te";
        $plate29->price = 8;
        $plate29->discount = 0;
        $plate29->availability = 1;
        $plate29->image = 'https://images.immediate.co.uk/production/volatile/sites/30/2020/12/Noodles-with-chilli-oil-eggs-6ec34e9.jpg?resize=768,574';
        $plate29->save();

        $plate30 = new Plate();
        $plate30->name = "Insalata 'o wok";
        $plate30->user_id = 10;
        $plate30->ingredients = "Cavolo cappuccio, germogli di soia, carote, salsa yogurt e soia, aceto, olio, semi";
        $plate30->description = "Incredibile insalata tradizionale Thai, super leggera per rimanere leggeri";
        $plate30->price = 5;
        $plate30->discount = 0;
        $plate30->availability = 1;
        $plate30->image = 'https://www.denner.ch/fileadmin/user_upload/content/Blog-Fotos-Video/2017/kw07-2017-wok-1200x675.jpg';
        $plate30->save();

        $plate31 = new Plate();
        $plate31->name = 'Panino dallas';
        $plate31->user_id = 11;
        $plate31->ingredients = "Hamburger di scottona 180g, funghi chiodini, pancetta di maialino nero casertano, provola di Agerola e crema di noci";
        $plate31->description = "Hamburger di carne 100% bovina da allevamenti italiani che abbracciano il formaggio filante";
        $plate31->price = 9;
        $plate31->discount = 0;
        $plate31->availability = 1;
        $plate31->image = 'https://rs-menus-api.roocdn.com/images/d678e5c3-2810-45ff-9ed0-7391ff44c625/image.jpeg?width=402.75&height=226.5&auto=webp&format=jpg&fit=crop';
        $plate31->save();

        $plate32 = new Plate();
        $plate32->name = 'Panino Napoli';
        $plate32->user_id = 11;
        $plate32->ingredients = "Hamburger di scottona 180g, pancetta di maialino nero casertano, crema di friarielli e stracciata di bufala";
        $plate32->description = "Il panino più buono della Campania";
        $plate32->price = 9;
        $plate32->discount = 0;
        $plate32->availability = 1;
        $plate32->image = 'https://rs-menus-api.roocdn.com/images/05ea1a4e-4ee5-4ac2-9914-154147508947/image.jpeg?width=402.75&height=226.5&auto=webp&format=jpg&fit=crop';
        $plate32->save();

        $plate33 = new Plate();
        $plate33->name = 'Panino mosca';
        $plate33->user_id = 11;
        $plate33->ingredients = "Hamburger di scottona 180g, provola, speck, cipolla caramellata, crema di carciofi e patate al forno";
        $plate33->description = "Ottimo panino da gustare con gli amici comodamente a casa";
        $plate33->price = 9;
        $plate33->discount = 0;
        $plate33->availability = 1;
        $plate33->image = 'https://rs-menus-api.roocdn.com/images/b621b5d1-4e70-44b3-ab24-545abdf14338/image.jpeg?width=402.75&height=226.5&auto=webp&format=jpg&fit=crop%22';
        $plate33->save();

        $plate34 = new Plate();
        $plate34->name = 'SPIEDINI AL BBQ CON POLPETTE DI VERDURE';
        $plate34->user_id = 12;
        $plate34->ingredients = "Zucchine, peperoni, cipolla, aglio, ananas";
        $plate34->description = "Se amate combinare sapori diversi questo piatto è perfetta per voi!";
        $plate34->price = 7;
        $plate34->discount = 0;
        $plate34->availability = 1;
        $plate34->image = 'https://wips.plug.it/cips/buonissimo.org/cms/2012/05/spiedini-di-verdure-alla-brace.jpg?w=712&a=c&h=406';
        $plate34->save();

        $plate35 = new Plate();
        $plate35->name = 'INSALATA DI PASTA VEGETARIANA CON VUNA';
        $plate35->user_id = 12;
        $plate35->ingredients = "Penne integrali, cipolla, cetrioli, pomodorini,  barattolo di mais";
        $plate35->description = "Se state cercando ispirazione per il pranzo, dovreste provare questa insalata di pasta fatta con Vuna Garden Gourmet.";
        $plate35->price = 9;
        $plate35->discount = 0;
        $plate35->availability = 1;
        $plate35->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj0W6CmcW-b0zSEpBir1g05skFBtJ9eLr5UHIUhh1DVghPOP6KPN1N41eZm7encunCDgE&usqp=CAU';
        $plate35->save();

        $plate36 = new Plate();
        $plate36->name = 'Veggie Burger con Stracciatella e Olive';
        $plate36->user_id = 12;
        $plate36->ingredients = "Panini, scarola, spicchio di aglio, stracciatella di burrata, olive taggiasche, patate";
        $plate36->description = "Avete voglia di provare una ricetta per un burger di tutto un altro livello? Provate il Sensational Burger Garden Gourmet";
        $plate36->price = 8;
        $plate36->discount = 0;
        $plate36->availability = 1;
        $plate36->image = 'https://storage.ecodibergamo.it/media/photologue/2020/6/16/photos/burger-vegetariani-tre-idee-semplici-e-buone-da-replicare-a-casa_d47644c2-afc6-11ea-a50c-b6d80997dbb2_1400_933.33.jpg';
        $plate36->save();
    }
}
