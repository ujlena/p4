@extends("layouts.master")

@section("title")
    Create new skincare product
@endsection

@section("content")
    <h2>Create new skincare product</h2>
    
    <form method='POST' action='/show-all'>
        <div class='foralign'>

            {{ csrf_field() }}

            <p>
                <label for='type'>Type</label>
                <select name='type' id='type'>
                    <option value='Cleansers' {{ (old("type") == "Cleansers") ? "SELECTED" : "" }}>Cleansers</option>
                    <option value='Toners' {{ (old("type") == "Toners") ? "SELECTED" : "" }}>Toners</option>
                    <option value='Moisturizers' {{ (old("type") == "Moisturizers") ? "SELECTED" : "" }}>Moisturizers</option>
                    <option value='Eyecreams' {{ (old("type") == "Eyecreams") ? "SELECTED" : "" }}>Eye Creams</option>
                </select>
                @if($errors->get('type'))
                    <ul>
                        @foreach($errors->get('type') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
            </p>

            <p>
                <label for='brand'>Brand</label>
                <select name='brand' id='brand'>
                    @foreach($brandsForDropDown as $id => $name)
                        <option value='{{ $id }}'>{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->get('brand'))
                    <ul>
                        @foreach($errors->get('brand') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
            </p>

            <p>
                <label for='name'>Name</label>
                <input type='text' name='name' id='name' value="{{ old('name') }}" placeholder='Soy Face Cleanser'>
                @if($errors->get('name'))
                    <ul>
                        @foreach($errors->get('name') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
            </p>

            <p>
                <label for='price'>Price $</label>
                <input type='number' name='price' id='price' value="{{ old('price') }}" placeholder='38'>
                @if($errors->get('price'))
                    <ul>
                        @foreach($errors->get('price') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
            </p>

            <p>Skin Type
                <p>
                    <input type="radio" id="dry" name="skintype" value="Dry" {{ (old("skintype") == "Dry") ? "CHECKED" : "" }}>
                    <label for="dry">Dry</label>
                </p>
                <p> 
                    <input type="radio" id="oily" name="skintype" value="Oily" {{ (old("skintype") == "Oily") ? "CHECKED" : "" }}>
                    <label for="oily">Oily</label>
                </p>
                <p> 
                    <input type="radio" id="combination" name="skintype" value="Combination" {{ (old("skintype") == "Combination") ? "CHECKED" : "" }}>
                    <label for="combination">Combination</label>
                </p>
                <p>
                    <input type="radio" id="normal" name="skintype" value="Normal" {{ (old("skintype") == "Normal") ? "CHECKED" : "" }}>
                    <label for="normal">Normal</label>
                </p>
                @if($errors->get('skintype'))
                    <ul>
                        @foreach($errors->get('skintype') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>

            <p>
                <label for='url'>Website</label>
                <input type='text' name='url' id='url' value="{{ old('url') }}" placeholder='http://www.fresh.com/US/best-sellers/soy-face-cleanser/H00000002.html#prevPage=menu&start=1&cgid=cleansers'>
                @if($errors->get('url'))
                    <ul>
                        @foreach($errors->get('url') as $error)
                            <li class='inputerror'>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
            </p>
        
        </div><!--foralign-->

        <p>
            <input type='submit' class='btn' value='Add Product'>
        </p>
    </form>
@endsection