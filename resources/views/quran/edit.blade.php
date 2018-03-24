@extends('layouts.main')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="content" style="height: 586px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">انشاء دعوه سريعه جديدة</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel panel-default">

				        <div class="panel-body">
				            <form id="myForm" method="POST" action="{{ route('updateQuran', ['id' => $quran->id]) }}" enctype="multipart/form-data" data-validate="parsley">
				                {{ csrf_field() }}
				                <div class="form-group">
				                    <label for="name" style="float: right">
				                        رابط التفسير
				                    </label>
				                    <input class="form-control" id="name" value="{{ $quran->link }}" type="text" name="name" autocomplete="off" data-parsley-trigger="change focusout" data-parsley-required=''></input>
				                </div>
                                <div class="form-group">
                                    <label for="country_selector">
                                        اللغة
                                    </label>
                                    <div class="form-item">
                                        <input id="country_selector" name="country_selector" type="text">
                                        <label for="country_selector" style="display:none;">Select a country here...</label>
                                    </div>
                                    <div class="form-item" style="display:none;">
                                        <input type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
                                        <label for="country_selector_code">...and the selected country code will be updated here</label>
                                    </div>
                                    <button type="submit" style="display:none;">Submit</button>
                                </div>
				                <div class="form-group">
				                    <div class="text-center">
				                        <input class="btn btn-success" type="submit" style="padding-left: 25px;padding-right: 25px" value="تم">
				                    </div>
				                </div>
				            </form>
				        </div>
				    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
  $('#myForm').parsley();
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('build/js/countrySelect.js') }}"></script>
<script>
    $("#country_selector").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['eg', 'gb', 'us']
    });
</script>
<script type="text/javascript">
	var countryData = $("#country").countrySelect("getSelectedCountryData");
	console.log(countryData);
</script>
@endsection