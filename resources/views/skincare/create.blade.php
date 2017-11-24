@extends("layouts.master")

@section("title")
    Create new skincare product
@endsection

@push("head")
@endpush

@section("content")
    <h1>Create new skincare product</h1>
    <form method='POST' action='/skincare/'>

        {{ csrf_field() }}

        <label for='type'>Type</label>
        <select name='type' id='type'>
            <option value='cleansers'>Cleansers</option>
            <option value='toners'>Toners</option>
            <option value='moisturizers'>Moisturizers</option>
            <option value='eyecreams'>Eye Creams</option>
        </select>

        <label for='brand'>Brand</label>
        <input type='text' name='brand' id='brand' value='{{ old('brand') }}'>

        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>

        <label for='price'>Price $</label>
        <input type='number' name='price' id='price' value='{{ old('price') }}'>

        <p>Skin Type</p>
        <p>
            <input type="radio" id="dry" name="skintype" value="dry" {{ (old("skintype") == "dry") ? "CHECKED" : "" }}>
            <label for="dry">Dry</label>
        </p>
        <p> 
            <input type="radio" id="oily" name="skintype" value="oily" {{ (old("skintype") == "oily") ? "CHECKED" : "" }}>
            <label for="oily">Oily</label>
        </p>
        <p> 
            <input type="radio" id="combination" name="skintype" value="combination" {{ (old("skintype") == "combination") ? "CHECKED" : "" }}>
            <label for="combination">Combination</label>
        </p>
        <p>
            <input type="radio" id="normal" name="skintype" value="normal" {{ (old("skintype") == "normal") ? "CHECKED" : "" }}>
            <label for="normal">Normal</label>
        </p>

        <label for='url'>Website</label>
        <input type='text' name='url' id='url' value='{{ old('url') }}'>

        <p>
            <input type='submit' class='btn' value='Add Product'>
        </p>
    </form>
@endsection
