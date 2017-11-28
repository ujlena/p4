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

        $newestProduct = $products->sortByDesc('created_at')->take(1);

    	return view('skincare.showAll')->with([
    		'products' => $products,
            'newestProduct' => $newestProduct,
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

        # Add new skincare product to the database
    	$skincare = new Skincare();

    	$skincare->type = $request->input('type');
    	$skincare->brand = $request->input('brand');
    	$skincare->name = $request->input('name');
    	$skincare->price = $request->input('price');
    	$skincare->skintype = $request->input('skintype');
    	$skincare->url = $request->input('url'); 
    	$skincare->save();
	
    	return redirect('/show-all/')->with('alert', 'New product "'.$request->input('name').'" just added!');
    }

    public function edit($id)
    {
        $skincare = Skincare::find($id);

        if(!$skincare) {
            return redirect('/show-all')->with('alert', 'No product found.');
        }
        return view('skincare.edit')->with([
            'skincare' => $skincare
        ]);
    }

    public function update(Request $request, $id)
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

        $skincare = Skincare::find($id);

        $skincare->type = $request->input('type');
        $skincare->brand = $request->input('brand');
        $skincare->name = $request->input('name');
        $skincare->price = $request->input('price');
        $skincare->skintype = $request->input('skintype');
        $skincare->url = $request->input('url'); 
        $skincare->save();

        return redirect('/show-all/'.$id.'/edit')->with('alert', 'Your changes were saved.');
    }

    public function delete($id)
    {
        $skincare = Skincare::find($id);

        if(!$skincare) {
            return redirect('/show-all')->with('alert', 'No product found.');
        }
        
        $skincare->delete();
        $deletedProductBrand = $skincare->brand;
        $deletedProductName = $skincare->name;

        return redirect('/show-all')->with('alert', $deletedProductBrand.' | '.$deletedProductName . ' has been deleted.');
    }
}
