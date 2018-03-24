@extends('layouts.main')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="content" style="height: 586px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">اضافة ارقام الدعاة</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel panel-default">

				        <div class="panel-body">
				            <form id="myForm" method="POST" action="{{ route('advisorCreate') }}" enctype="multipart/form-data" data-validate="parsley">
				                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" style="float: right">
                                        اسم الداعية
                                    </label>
                                    <input class="form-control" id="name" type="text" name="name" autocomplete="off" data-parsley-trigger="change focusout" data-parsley-required=''></input>
                                </div>
				                <div class="form-group">
				                    <label for="phone" style="float: right">
				                        رقم الداعية
				                    </label>
				                    <input class="form-control" id="phone" type="text" name="phone" autocomplete="off" data-parsley-trigger="change focusout" data-parsley-required=''></input>
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