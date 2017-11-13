<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [

        	['Belif',  'LG Household & Health Care', 2005, 'Seoul, South Korea', 'http://www.belifcosmetic.com/'],
        	['Lancome', 'Armand Petitjean', 1935, 'Paris, France', 'https://www.lancome-usa.com/'],
        	['Fresh', 'Lev Glazman, Alina Roytberg', 1991, 'U.S.', 'https://www.fresh.com/'],
        	['Kiehl\'s', 'John Kiehl', 1851, 'New York City, U.S.', 'https://www.kiehls.com/'],
        	['Origins', 'Leonard Lauder', 1990, 'U.S.', 'https://www.origins.com/']

        ];

        $count = count($brands);

        foreach ($brands as $key => $brand) {
        	Brand::insert([
        		'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
	        	'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
	        	'name' => $brand[0],
	        	'founder' => $brand[1],
	        	'year' => $brand[2],
	        	'headquarters' => $brand[3],
	        	'url' => $brand[4]
        	]);
        	$count--;
        }
    }
}
