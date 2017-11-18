@extends("layouts.master")

@section("title")
    Find your skincare products
@endsection

@push("head")
    
@endpush

@section("content")
    <h1>Find your skincare products</h1>
	<form method="GET" action="/skincare/match-products">
		<p id="label_required">* Required</p>
		<p>
			<label for="producttypes">* Choose category</label>
			<select name="producttypes" id="producttypes">
				<option value="cleansers" {{ (old("producttypes") == "cleansers") ? "SELECTED" : "" }}>Cleansers</option>
				<option value="toners" {{ (old("producttypes") == "toners") ? "SELECTED" : "" }}>Toners</option>
				<option value="moisturizers" {{ (old("producttypes") == "moisturizers") ? "SELECTED" : "" }}>Moisturizers</option>
				<option value="eyecreams" {{ (old("producttypes") == "eyecreams") ? "SELECTED" : "" }}>Eye Creams</option>
			</select>
		</p>

		<p>* Select your skin type</p>
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

		<p>
			<label for="pricerange">* Price Range (10~100) $</label>
			<input type="number" name="pricerange" id="pricerange" min="10" max="100" value="{{ old("pricerange") }}">
		</p>
		<p>
			<input type="submit" class="btn" value="Find one for me">
		</p>			

	</form>

	@if(count($errors) > 0) 
		<ul id="errormsg">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	
@endsection