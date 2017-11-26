@extends("layouts.master")

@section("title")
    All Skincare Products
@endsection

@section("content")
    <div class='newestProduct' style='background-color:yellow'>
        <h1>New Skincare Products were recently added</h1>
        @foreach($newestProduct as $product) 
            <h2>type: {{ $product->type }}</h2>
            <p>brand: {{ $product->brand }}</p>
            <p>name: {{ $product->name }}</p>
            <p>price: ${{ $product->price }}</p>
            <p>skintype: {{ $product->skintype }}</p>
            <p>website: {{ $product->url }}</p>
        @endforeach
    </div>

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
