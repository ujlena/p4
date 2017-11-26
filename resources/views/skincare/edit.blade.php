@extends("layouts.master")

@section("title")
    Edit skincare product
@endsection

@push("head")
@endpush

@section("content")
    <h1>Edit skincare product: {{ $skincare->name }} from {{ $skincare->brand }}</h1>
    <form method='POST' action='/show-all/{{ $skincare->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}
        <p>
            <label for='type'>Type</label>
            <select name='type' id='type'>
                <option value='cleansers' {{ (old("producttypes") == "cleansers") ? "SELECTED" : "" }}>Cleansers</option>
                <option value='toners' {{ (old("producttypes") == "toners") ? "SELECTED" : "" }}>Toners</option>
                <option value='moisturizers' {{ (old("producttypes") == "moisturizers") ? "SELECTED" : "" }}>Moisturizers</option>
                <option value='eyecreams' {{ (old("producttypes") == "eyecreams") ? "SELECTED" : "" }}>Eye Creams</option>
            </select>

            @if($errors->get('type'))
                <ul>
                    @foreach($errors->get('type') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             @endif
        </p>

        <p>
            <label for='brand'>Brand</label>
            <input type='text' name='brand' id='brand' value="{{ old('brand', $skincare->brand) }}">
            @if($errors->get('brand'))
                <ul>
                    @foreach($errors->get('brand') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             @endif
        </p>

        <p>
            <label for='name'>Name</label>
            <input type='text' name='name' id='name' value="{{ old('name', $skincare->name) }}">
            @if($errors->get('name'))
                <ul>
                    @foreach($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             @endif
        </p>

        <p>
            <label for='price'>Price $</label>
            <input type='number' name='price' id='price' value="{{ old('price', $skincare->price) }}">
            @if($errors->get('price'))
                <ul>
                    @foreach($errors->get('price') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             @endif
        </p>

        <p>Skin Type
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
            @if($errors->get('skintype'))
                <ul>
                    @foreach($errors->get('skintype') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </p>

        <p>
            <label for='url'>Website</label>
            <input type='text' name='url' id='url' value="{{ old('url', $skincare->url) }}">
            @if($errors->get('url'))
                <ul>
                    @foreach($errors->get('url') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             @endif
        </p>

        <p>
            <input type='submit' class='btn' value='Save Changes'>
        </p>
    </form>
@endsection
