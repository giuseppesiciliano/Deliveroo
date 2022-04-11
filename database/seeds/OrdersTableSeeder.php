<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $order = new Order();

            $order->customer_name = $faker->name();
            $order->customer_lastname = $faker->lastName();
            $order->customer_address = $faker->streetAddress();
            $order->order_status = true;
            $order->customer_email = $faker->email();
            $order->customer_phone = $faker->randomNumber(9, true);
            $order->notes = $faker->text(20);
            $order->total_price = 100;
            $order->date = $faker->dateTime();
            $order->save();
        }
    }
}
