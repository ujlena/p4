<?php

use Illuminate\Database\Seeder;
use App\Skincare;
use App\Brand;

class SkincaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skincares = [
        	['Cleansers', 'Belif', 'Gentle Cleansing Emulsion', 28, 'Dry', 'http://global.belifcosmetic.com/product/detail.jsp?pid=B5000005&cid1=A&cid2=A'],

        	['Cleansers', 'Lancome', 'Gel Radiance', 26, 'Dry', 'http://www.lancome-usa.com/Gel-Radiance/1000186,default,pd.html?cgid=skincare-cleanse#start=6'],

        	['Toners', 'Fresh', 'Rose Floral Toner', 40, 'Normal', 'http://www.fresh.com/US/toner-%26-infusion/rose-floral-toner/H00000496.html'],

        	['Toners', 'Kiehl\'s', 'Calendula Herbal Extract Toner', 21, 'Oily', 'http://www.kiehls.com/calendula-herbal-extract-alcohol-free-toner/254.html?cgid=face-toners&dwvar_254_size=4.2%20fl.%20oz.%20Bottle#start=1&cgid=face-toners'],

        	['Moisturizers', 'Kiehl\'s', 'Ultra Facial Cream', 27.50, 'Normal', 'http://www.kiehls.com/ultra-facial-cream/622.html?cgid=face-moisturizers&dwvar_622_size=4.2%20fl.%20oz.%20Jar#start=4&cgid=face-moisturizers'],

        	['Moisturizers', 'Belif', 'Moisturizing Bomb', 38, 'Dry', 'http://global.belifcosmetic.com/product/detail.jsp?pid=B5000025&cid1=A&cid2=E'],

        	['Eyecreams', 'Origins', 'Refreshing Eye Cream', 30, 'Normal', 'http://www.origins.com/product/15348/11641/skincare/treat/eye-care/GinZing/Refreshing-Eye-Cream-to-Brighten-and-Depuff'],

        	['Eyecreams', 'Kiehl\'s', 'Creamy Eye Treatment', 48, 'Dry', 'http://www.kiehls.com/creamy-eye-treatment-with-avocado/258.html?cgid=face-eye&dwvar_258_size=0.95%20fl.%20oz.%20Jar#start=4&cgid=face-eye']
        ];

        $count = count($skincares);

        foreach ($skincares as $key => $skincare) {
            $brand_name = $skincare[1];
            $brand_id = Brand::where('name', '=', $brand_name)->pluck('id')->first();
            dump($brand_id);
        	Skincare::insert([
	        	'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
	        	'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
	        	'type' => $skincare[0],
	        	#'brand' => $skincare[1],
                'brand_id' => $brand_id,
	        	'name' => $skincare[2],
	        	'price' => $skincare[3],
	        	'skintype' => $skincare[4],
	        	'url' => $skincare[5]
        	]);
        	$count--;
        }
    }
}