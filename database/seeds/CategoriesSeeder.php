<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 20)->create()->each(function ($category) {
            $parentCategory = Category::inRandomOrder()->first();
            $parentCategory->children()->save(factory(App\Category::class)->make());
        });
    }
}
