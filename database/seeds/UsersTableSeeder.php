<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $user = new User();

        $user->name = 'Grazia';
        $user->email = 'graziaegraziella@gmail.com';
        $user->password = $faker->password();
        $user->phone_number = '327 248 302';
        $user->restaurant_name = 'Grazia e Graziella';
        $user->address = 'Viale Battista Bardanzellu, 27';
        $user->vat_number = $faker->randomNumber(9, true);
        $user->img_path = 'restaurant-1.jpg';
        $user->slug = User::getUniqueSlugFromTitle($user->restaurant_name);
        $user->description = 'Il ristorante Grazia e Graziella in pochi anni è riuscito ad affermarsi come attività di riferimento per la zona e non solo.';
        $user->save();

        $user->categories()->sync([ 
            1,
            3,
            6,
        ]);


        $user = new User();

        $user->name = 'Whuang';
        $user->email = 'kaori@gmail.com';
        $user->password = $faker->password();
        $user->phone_number = '390 984 781';
        $user->restaurant_name = 'Kaori';
        $user->address = 'Viale Europa, 57';
        $user->vat_number = $faker->randomNumber(9, true);
        $user->img_path = 'restaurant-2.jpg';
        $user->slug = User::getUniqueSlugFromTitle($user->restaurant_name);
        $user->description = 'In questo ristorante non ci sono i soliti piatti della cucina cinese a cui siamo abituati in Italia, ma è possibile trovare i cibi della vera cucina cinese. ';
        $user->save();

        $user->categories()->sync([ 
            2,
            3,
            9,
        ]);

        $user = new User();

        $user->name = 'Antonella';
        $user->email = 'nero9@gmail.com';
        $user->password = $faker->password();
        $user->phone_number = '079 986 209';
        $user->restaurant_name = 'Nero 9';
        $user->address = 'Via dei mille, 11';
        $user->vat_number = $faker->randomNumber(9, true);
        $user->img_path = 'restaurant-3.jpg';
        $user->slug = User::getUniqueSlugFromTitle($user->restaurant_name);
        $user->description = 'Una famiglia, dal 1980, che propone una cucina di solo pesce tipica del territorio dei lidi ferraresi, semplice e sincera.';
        $user->save();

        $user->categories()->sync([ 
            4,
            5,
            8,
        ]);

        $user = new User();

        $user->name = 'Davide';
        $user->email = 'nannarella@gmail.com';
        $user->password = $faker->password();
        $user->phone_number = '06 581 537';
        $user->restaurant_name = 'Nannarella';
        $user->address = 'Piazza di San Castillo, 7';
        $user->vat_number = $faker->randomNumber(9, true);
        $user->img_path = 'restaurant-4.jpg';
        $user->slug = User::getUniqueSlugFromTitle($user->restaurant_name);
        $user->description = 'La mission del nostro locale è quella di proporre solo ed esclusivamente piatti legati alla nostra tradizione, fatti con materie prime di qualità';
        $user->save();

        $user->categories()->sync([ 
            8,
            9,
            10,
        ]);

        $user = new User();

        $user->name = 'Karim';
        $user->email = 'icinquesensi@gmail.com';
        $user->password = $faker->password();
        $user->phone_number = '331 032 125';
        $user->restaurant_name = 'I cinque sensi';
        $user->address = 'Via della resistenza, 46';
        $user->vat_number = $faker->randomNumber(9, true);
        $user->img_path = 'restaurant-5.jpg';
        $user->slug = User::getUniqueSlugFromTitle($user->restaurant_name);
        $user->description = 'Siamo un ristorante a conduzione familiare che vuole trasmettere ai propri ospiti un viaggio. ';
        $user->save();

        $user->categories()->sync([ 
            1,
            3,
            8,
        ]); 




        
    }
}
