@extends('layouts.main')



@section('content')
<section class="content" style="height: 586px">
	<div class="panel panel-default" style="background-color: white;margin-top: 15px;" >

		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						اللغة
					</th>
					<th>
						علم اللغة
					</th>
					<th>
						حذف
					</th>
				</thead>
				<tbody>
					@if($languages->count() > 0)
						@foreach($languages as $lang)
							<tr>
								<td>
									{{ $lang->name }}
								</td>
								<td>
									<img src="{{ $lang->flag }}" width="70px" height="70px" alt="{{ $lang->name }}">
								</td>
								<td>
									<a href="{{ route('deleteLanguage', ['id' => $lang->id]) }}" class="btn btn-xs btn-danger">
										حذف
									</a>
								</td>
								
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">لا يوجد لغات.</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	</section>
@stop