<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       
        $dishes_type = ['Primi', 'Secondi', 'Contorni', 'Dolci', 'Anti Pasto'];

        $dish = new Dish();

        $dish->name = 'Tagliatelle ai funghi porcini';
        $dish->ingredients = 'tagliatelle, funghi porcini, pomodoro';
        $dish->price = 7.50;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 3;
        $dish->img_path = "dish-1.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Bistecca ai ferri';
        $dish->ingredients = 'carne di vitello, rosmarino';
        $dish->price = 9.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 1;
        $dish->img_path = "dish-2.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Hosomaki';
        $dish->ingredients = 'riso, alga nori, gamberi, salsa';
        $dish->price = 6.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 2;
        $dish->img_path = "dish-3.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Temaki';
        $dish->ingredients = 'riso, alga nori, salmone, avocado';
        $dish->price = 5.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 2;
        $dish->img_path = "dish-4.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Fritto misto';
        $dish->ingredients = 'calamri, gamberi, sardine';
        $dish->price = 8.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 1;
        $dish->img_path = "dish-5.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Pizza margherita';
        $dish->ingredients = 'farina 00, pomodoro, mozzarella';
        $dish->price = 4.50;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 3;
        $dish->img_path = "dish-6.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Pancake';
        $dish->ingredients = 'farina, uova, latte, burro, lievito, zuccchero a velo';
        $dish->price = 4.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 4;
        $dish->img_path = "dish-7.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Poke bowl';
        $dish->ingredients = 'salmone, mango, basilico, edamame, avocado, semi di sesamo olio di sesamo';
        $dish->price = 5.50;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 4;
        $dish->img_path = "dish-8.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Involtini primavera';
        $dish->ingredients = 'cavolo cappuccio, carote, cipolle, pasta sfoglia';
        $dish->price = 4.50;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 5;
        $dish->img_path = "dish-10.jpg";
        $dish->visible = true;
        $dish->save();

        $dish = new Dish();

        $dish->name = 'Tempura di gamberi';
        $dish->ingredients = 'gamberi, carote, zucchine, farina di riso, olio di semi';
        $dish->price = 6.00;
        $dish->type = $dishes_type[rand(0, 4)];
        $dish->user_id = 5;
        $dish->img_path = "dish-9.jpg";
        $dish->visible = true;
        $dish->save();

        // $dish = new Dish();

        // $dish->name = 'Pancake';
        // $dish->ingredients = 'farina, uova, latte, burro, lievito, zuccchero a velo';
        // $dish->price = 4.00;
        // $dish->type = $dishes_type[rand(0, 4)];
        // $dish->user_id = 4;
        // $dish->img_path = "dish-7.jpg";
        // $dish->visible = true;
        // $dish->save();

        // $dish = new Dish();

        // $dish->name = 'Poke bowl';
        // $dish->ingredients = 'salmone, mango, basilico, edamame, avocado, semi di sesamo olio di sesamo';
        // $dish->price = 5.50;
        // $dish->type = $dishes_type[rand(0, 4)];
        // $dish->user_id = 4;
        // $dish->img_path = "dish-8.jpg";
        // $dish->visible = true;
        // $dish->save();



        

        
    }
}
