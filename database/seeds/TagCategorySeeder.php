<?php

use Illuminate\Database\Seeder;
use App\TagCategory;

class TagCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sport', 'Region', 'Distance', 'Event Charities/Sponsors'];

        foreach ($categories as $category){
            $tag_category = new TagCategory();
            $tag_category->name = $category;
            $tag_category->slug = str_slug($category);
            $tag_category->save();
        }
    }
}
