@extends("layouts.master")

@section("title")
    All Skincare Products
@endsection

@push("head")
@endpush

@section("content")
    <h1>See All Skincares</h1>
		@foreach($products as $product) 
        	<h2>type: {{ $product->type }}</h2>
        	<p>brand: {{ $product->brand }}</p>
        	<p>name: {{ $product->name }}</p>
        	<p>price: {{ $product->price }}</p>
        	<p>skintype: {{ $product->skintype }}</p>
        	<p>website: {{ $product->url }}</p>
        @endforeach
@endsection

@push("body")
@endpush