@extends("layouts.master")

@section("title")
    Edit skincare product
@endsection

@section("content")
    <h2>You're editing .. </h2> 
    <p id='nowedit'><strong>{{ $skincare->name }}</strong> from <strong>{{ $skincare->brand->name }}</strong></p>

    <form method='POST' action='/show-all/{{ $skincare->id }}'>
        <div class='foralign'>

            {{ method_field('put') }}
            {{ csrf_field() }}

            <p>
                <label for='type'>Type</label>
                <select name='type' id='type'>
                    <option value='Cleansers' {{ (old("type", $skincare->type) == "Cleansers") ? "SELECTED" : "" }}>Cleansers</option>
                    <option value='Toners' {{ (old("type", $skincare->type) == "Toners") ? "SELECTED" : "" }}>Toners</option>
                    <option value='Moisturizers' {{ (old("type", $skincare->type) == "Moisturizers") ? "SELECTED" : "" }}>Moisturizers</option>
                    <option value='Eyecreams' {{ (old("type", $skincare->type) == "Eyecreams") ? "SELECTED" : "" }}>Eye Creams</option>
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
                <select name='brand' id='brand'>
                    @foreach($brandsForDropDown as $id => $name)
                        <option value='{{ $id }}' {{ ($id == $skincare->brand->id) ? 'SELECTED' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>

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
                    <input type="radio" id="dry" name="skintype" value="Dry" {{ (old("skintype", $skincare->skintype) == "Dry") ? "CHECKED" : "" }}>
                    <label for="dry">Dry</label>
                </p>
                <p> 
                    <input type="radio" id="oily" name="skintype" value="Oily" {{ (old("skintype", $skincare->skintype) == "Oily") ? "CHECKED" : "" }}>
                    <label for="oily">Oily</label>
                </p>
                <p> 
                    <input type="radio" id="combination" name="skintype" value="Combination" {{ (old("skintype", $skincare->skintype) == "Combination") ? "CHECKED" : "" }}>
                    <label for="combination">Combination</label>
                </p>
                <p>
                    <input type="radio" id="normal" name="skintype" value="Normal" {{ (old("skintype", $skincare->skintype) == "Normal") ? "CHECKED" : "" }}>
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
                <label for='tags'>Concerns</label><br>
                @foreach ($tagsForCheckboxes as $id => $name) 
                    <input type='checkbox' value='{{ $id }}' id='tags' name='tags[]' {{ (in_array($name, $tagsForThisProduct)) ? 'CHECKED' : '' }} >{{ $name }}<br>
                @endforeach
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
        </div><!--formalign-->

        <p>
            <input type='submit' class='btn' value='Save Changes'>
        </p>
    </form>
@endsection