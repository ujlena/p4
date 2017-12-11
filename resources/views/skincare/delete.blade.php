@extends("layouts.master")

@section("title")
    Delete skincare product
@endsection

@push("head")
@endpush

@section("content")
    <h1>You want to delete .. </h1>
    <p id='nowedit'><strong>{{ $skincare->name }}</strong> from <strong>{{ $skincare->brand->name }}</strong></p>

    <form method='POST' action='/skincare/{{ $skincare->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Delete'>
    </form>
@endsection