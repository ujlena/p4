@extends("layouts.master")

@section("title")
    All Skincare Products
@endsection

@section("content")
    <div class='newestProduct' style='background-color:yellow'>
        <h1>New Skincare Products were recently added</h1>
        @foreach($newestProduct as $product) 
        <p>: {{ $product->type }} | {{ $product->brand }} | {{ $product->name }}</p>
        @endforeach
    </div>

    <h1>See All Skincares</h1>
		@foreach($products as $product) 
        	<h2>Type: {{ $product->type }}</h2>
        	<p>Brand: {{ $product->brand }}</p>
        	<p>Name: {{ $product->name }}</p>
        	<p>Price: {{ $product->price }}</p>
        	<p>Skintype: {{ $product->skintype }}</p>
        	<p>Website: {{ $product->url }}</p>
            <ul>
                <li><a href="/show-all/{{ $product['id'] }}/edit">edit</a></li>
                <li><a href="/show-all/{{ $product['id'] }}/delete">delete</a></li>
            </ul>
        @endforeach
@endsection
