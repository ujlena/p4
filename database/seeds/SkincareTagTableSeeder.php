<?php

use Illuminate\Database\Seeder;
use App\Skincare;
use App\Tag;

class SkincareTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skincares = [
        	'Moisturizing Bomb' => ['dryness', 'dullness'],
        	'Calendula Herbal Extract Toner' => ['uneven-texture', 'pores'],
        	'Ultra Facial Cream' => ['dryness', 'dullness', 'anti-aging']
        ];

        foreach($skincares as $name => $tags) {
        	$skincare = Skincare::where('name', 'like', $name)->first();

        	foreach($tags as $tagName) {
        		$tag = Tag::where('name', 'like', $tagName)->first();
        		$skincare->tags()->save($tag);
        	}
        }
    }
}
