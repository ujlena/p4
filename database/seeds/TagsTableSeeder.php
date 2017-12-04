<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
        	'acne', 'redness', 'dryness', 'pores', 'anti-aging', 'dullness', 'uneven-texture'
        ];

        foreach ($tags as $tagName) {
        	$tag = new Tag();
        	$tag->name = $tagName;
        	$tag->save();
        }
    }
}
