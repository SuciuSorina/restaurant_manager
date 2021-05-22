<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "c1" => [
                "id"    => 1,
                "name"  => 'Soup'
            ],
            "c2" => [
                "id"    => 2,
                "name" => 'Pizza'
            ],
            "c3" => [
                "id"    => 3,
                "name" => 'Meat'
            ],
            "c4" => [
                "id"    => 4,
                "name" => 'Pasta'
            ],
            "c5" => [
                "id"    => 5,
                "name" => 'Alchoolic Drinks'
            ],
            "c6" => [
                "id"    => 6,
                "name" => 'Nonalchoolic Drinks'
            ],
            "c7" => [
                "id"    => 7,
                "name" => 'Sandwich'
            ]
        ];

        foreach($categories as $c) {
            $category = new Category();
            $category->create($c);
        }
    }
}
