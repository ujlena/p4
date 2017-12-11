<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandsTableSeeder::class);
        $this->call(SkincaresTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(SkincareTagTableSeeder::class);
    }
}