<?php

use App\PageCategory;
use Illuminate\Database\Seeder;

class PageCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Front', 'Simple', 'Contact'];

        foreach ($categories as $category){
            $tag_category = new PageCategory();
            $tag_category->name = $category;
            $tag_category->slug = str_slug($category);
            $tag_category->save();
        }
    }
}
