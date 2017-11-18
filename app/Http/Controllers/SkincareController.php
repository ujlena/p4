<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skincare;

class SkincareController extends Controller
{
    public function index() 
    {
    	return view('skincare.index');
    }

    public function showAll()
    {
    	$products = Skincare::all();

    	return view('skincare.showAll')->with([
    		'products' => $products
    	]);
    }
}
