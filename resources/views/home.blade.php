@extends('layouts.main')

@section('content')
<div class="container" style="height: 586px">
    <form>
        <div class="form-item">
            <input id="country_selector" type="text">
            <label for="country_selector" style="display:none;">Select a country here...</label>
        </div>
        <div class="form-item" style="display:none;">
            <input type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
            <label for="country_selector_code">...and the selected country code will be updated here</label>
        </div>
        <button type="submit" style="display:none;">Submit</button>
    </form>
</div>
@endsection
@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('build/js/countrySelect.js') }}"></script>
<script>
    $("#country_selector").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['eg', 'gb', 'us']
    });
</script>
@endsection
