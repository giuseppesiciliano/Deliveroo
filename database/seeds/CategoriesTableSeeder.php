<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Italiano',
                'img_path' => ''
            ],
            [
                'name' => 'Cinese',
                'img_path' => ''
            ],
            [
                'name' => 'Giapponese',
                'img_path' => ''
            ],
            [
                'name' => 'Pasta',
                'img_path' => ''
            ],
            [
                'name' => 'Pizza',
                'img_path' => ''
            ],
            [
                'name' => 'Carne',
                'img_path' => ''
            ],
            [
                'name' => 'Dolci',
                'img_path' => ''
            ],
            [
                'name' => 'Colazione',
                'img_path' => ''
            ],
            [
                'name' => 'Vegetariano',
                'img_path' => ''
            ],
            [
                'name' => 'Vegano',
                'img_path' => ''
            ]
        ];

        foreach($categories as $category) {
            $new_category = new Category();

            $new_category->name = $category['name'];
            $new_category->img_path = $category['img_path'];
            $new_category->slug = Str::slug($category['name']);
            $new_category->save();
        }

    }
}
