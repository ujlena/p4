@extends("layouts.master")

@section("title")
    Products Matching
@endsection

@section("content")
    <h2>Your Matching Result</h2>
    <div>
        <h3>Here are some products for you..</h3>
       
        @forelse($matchingResult as $matchingProduct)
            <p>{{ $matchingProduct->brand->name }} | {{ $matchingProduct->name }}</p>
        @empty
            <p>No result found..</p>
        @endforelse
    </div>
@endsection