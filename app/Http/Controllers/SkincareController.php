<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skincare;
use App\Brand;
use App\Tag;

class SkincareController extends Controller
{
    public function index() 
    {
    	return view('skincare.index');
    }

    public function matchProducts(Request $request) 
    {  
        $this->validate($request, [
            'type' => 'required',
            'skintype' => 'required',
            'price' => 'required|numeric|min:10|max:100'
        ]);

        $matchingResult = Skincare::where('type', '=', $request->input('type'))
                                ->where('skintype', '=', $request->input('skintype'))
                                ->where('price', '<', $request->input('price'))->get();
       # dump($matchingResult);
        
        return view('skincare.matchProducts')->with([
            'matchingResult' => $matchingResult
        ]);
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
        /*$brands = Brand::get();
        $brandsForDropDown = [];

        foreach ($brands as $brand) {
            $brandsForDropDown[$brand->id] = $brand->name;
        }*/

        $brandsForDropDown = Brand::getForDropDown();
        
    	return view('skincare.create')->with([
            'brandsForDropDown' => $brandsForDropDown
        ]);
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

        # $brand = Brand::find($request->input('brand'));

        # Add new skincare product to the database
    	$skincare = new Skincare();

    	$skincare->type = $request->input('type');
    	# $skincare->brand = $request->input('brand');
        # $skincare->brand()->associate($brand); 
        $skincare->brand_id = $request->input('brand');
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

        $brandsForDropDown = Brand::getForDropDown();
        $tagsForCheckboxes = Tag::getForCheckboxes();
        $tagsForThisProduct = [];

        foreach($skincare->tags as $tag) {
            $tagsForThisProduct[] = $tag->name;
        }

        return view('skincare.edit')->with([
            'skincare' => $skincare,
            'brandsForDropDown' => $brandsForDropDown,
            'tagsForCheckboxes' => $tagsForCheckboxes,
            'tagsForThisProduct' => $tagsForThisProduct
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

        $skincare->tags()->sync($request->input('tags'));

        $skincare->type = $request->input('type');
        $skincare->brand_id = $request->input('brand');
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
        
        return view('skincare.delete')->with(['skincare' => $skincare]);
    }

    public function destroy($id) 
    {
        $skincare = Skincare::find($id);

        if(!$skincare) {
            return redirect('/show-all')->with('alert', 'No product found.');
        }

        $skincare->tags()->detach();

        $skincare->delete();

        $deletedProductBrand = $skincare->brand->name;
        $deletedProductName = $skincare->name;

        return redirect('/show-all')->with('alert', $deletedProductBrand.' | '.$deletedProductName . ' has been deleted.');
    }
}
