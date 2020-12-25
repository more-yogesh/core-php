<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $key) {
            $category = new SubCategory;
            $category->name = 'silk-' . $key;
            $category->category_id = rand(1, 5);
            $category->save();
        }
    }
}
