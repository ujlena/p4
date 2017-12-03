@extends("layouts.master")

@section("title")
    All Skincare Products
@endsection

@section("content")
    <h1>See All Skincares</h1>
    <div class='newestProduct'>
        <h3>New Skincare Products were recently added</h3>
        @foreach($newestProduct as $product) 
        <p>{{ $product->type }} | {{ $product->brand->name }} | {{ $product->name }}</p>
        @endforeach
    </div>
    <div class='mainfield'>
		@foreach($products as $product) 
        	<p>Type: {{ $product->type }}</p>
        	<p>Brand: {{ $product->brand->name }}</p>
        	<p>Name: {{ $product->name }}</p>
        	<p>Price: ${{ $product->price }}</p>
        	<p>Skintype: {{ $product->skintype }}</p>
        	<p>Website: <a href='{{ $product->url }}' target='_blank'>Visit website</a></p>
            <ul class='sublist'>
                <li><a href="/show-all/{{ $product['id'] }}/edit">edit</a></li>
                <li><a href="/show-all/{{ $product['id'] }}/delete">delete</a></li>
            </ul>
        @endforeach
    </div>
@endsection
