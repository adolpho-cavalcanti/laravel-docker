<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Gerente'],
            ['id' => 3, 'name' => 'Normal'],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
