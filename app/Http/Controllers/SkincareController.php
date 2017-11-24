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

    public function create() 
    {
    	return view('skincare.create');
    }

    public function store(Request $request)
    {
    	# Validation 
    	$this->validate($request, [
    		'type' => 'required',
    		'brand' => 'required',
    		'name' => 'required',
    		'price' => 'required|numeric|min:10|max:100',
    		'skintype' => 'required',
    		'url' => 'url'
    	]);

    	$skincare = new Skincare();
    	$skincare->type = $request->input('type');
    	$skincare->brand = $request->input('brand');
    	$skincare->name = $request->input('name');
    	$skincare->price = $request->input('price');
    	$skincare->skintype = $request->input('skintype');
    	$skincare->url = $request->input('url'); 
    	$skincare->save();
	
    	return redirect('/skincare/')->with([
    		'alert', 'Your product was added'
    	]);
    }
}
