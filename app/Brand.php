<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function skincares()
    {
    	# one-to-many
    	return $this->hasMany('App\Skincare');
    }

    public static function getForDropDown()
    {
    	$brands = Brand::get();
        $brandsForDropDown = [];

        foreach ($brands as $brand) {
            $brandsForDropDown[$brand->id] = $brand->name;
        }

        return $brandsForDropDown;
    }
}
