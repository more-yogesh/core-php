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
        foreach (range(1, 10) as $key) {
            $category = new Category;
            $category->name = 'Saree-'.$key;
            $category->price = 5000+$key;
            $category->image = 'demo.png';
            $category->save();
        }
    }
}
