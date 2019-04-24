<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;

class blog_categories_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Video', 'News', 'Discounts', 'Gear', 'Fitness'];
        foreach ($categories as $category){
            $blog_category = new BlogCategory();
            $blog_category->name = $category;
            $blog_category->slug = str_slug($category);
            $blog_category->save();
        }
    }
}
