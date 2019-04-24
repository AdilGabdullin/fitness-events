<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        $this->call(blog_categories_table_seeder::class);
        $this->call(TagCategorySeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PageCategoryTableSeeder::class);
    }
}
