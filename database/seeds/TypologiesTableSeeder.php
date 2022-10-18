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

        $newTypology1 = new Typology();
        $newTypology1->name = 'pizzeria';
        $newTypology1->image = 'https://media-assets.vanityfair.it/photos/61e444841e21bc3bd54b5357/1:1/w_2832,h_2832,c_limit/pizza%20tendenze.jpg';
        $newTypology1->save();

        $newTypology2 = new Typology();
        $newTypology2->name = 'sushi';
        $newTypology2->image = 'http://www.iacovellichef.com/wp-content/uploads/2019/07/mangiare-sushi.jpg';
        $newTypology2->save();

        $newTypology3 = new Typology();
        $newTypology3->name = 'trattoria';
        $newTypology3->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQInc7oVLm_sYlgP_55SaCmoaN1O1PARV5Ucg&usqp=CAU';
        $newTypology3->save();

        $newTypology4 = new Typology();
        $newTypology4->name = 'fusion';
        $newTypology4->image = 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/original_Uramaki-Mix.jpg';
        $newTypology4->save();

        $newTypology5 = new Typology();
        $newTypology5->name = 'vegan';
        $newTypology5->image = 'https://www.passioneperlabuonacucina.it/wp-content/uploads/2020/06/dieta-vegana-696x465-1.jpg';
        $newTypology5->save();

        $newTypology6 = new Typology();
        $newTypology6->name = 'taiwanese';
        $newTypology6->image = 'https://www.duebacchette.it/FOTO/POST_ARTICOLI/ARTICOLI/RICETTE/NOODLESINBRODODIMANZOALLATAIWANE/FOTO/noodles-in-brodo-di-manzo-alla-taiwanese.jpg';
        $newTypology6->save();

        $newTypology7 = new Typology();
        $newTypology7->name = 'indiano';
        $newTypology7->image = 'https://wips.plug.it/cips/buonissimo.org/cms/2013/04/13642512_m.jpg?w=713&a=c&h=407';
        $newTypology7->save();

        $newTypology8 = new Typology();
        $newTypology8->name = 'cinese';
        $newTypology8->image = 'https://www.chefperpassione.it/wp-content/uploads/2019/10/shutterstock_204336901-min-768x768.jpg';
        $newTypology8->save();

        $newTypology9 = new Typology();
        $newTypology9->name = 'fast food';
        $newTypology9->image = 'https://sqpiu.it/wp-content/uploads/2019/03/Fast-Food.jpg';
        $newTypology9->save();

        $newTypology10 = new Typology();
        $newTypology10->name = 'vegetariano';
        $newTypology10->image = 'https://www.buttalapasta.it/wp-content/uploads/2021/08/secondi-piatti-vegetariani.jpg';
        $newTypology10->save();

        $newTypology11 = new Typology();
        $newTypology11->name = 'paninoteca';
        $newTypology11->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1WA8rmJDIPiHsRBFAxEyhUDeJzWOW4N4tNg&usqp=CAU';
        $newTypology11->save();
    }
}


