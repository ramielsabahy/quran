@extends('layouts.main')



@section('content')
<section class="content" style="height: 586px">
	<div class="panel panel-default" style="background-color: white;margin-top: 15px;" >

		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						رابط التفسير
					</th>
					<th>
						اللغة
					</th>
					<th>
						تعديل
					</th>
					<th>
						حذف
					</th>
				</thead>
				<tbody>
					@if($information->count() > 0)
						@foreach($information as $info)
							<tr>
								<td>
										<a href="{{ $info->link }}"> اضغط لعرض التفسير </a>
								</td>
								<td>
									{{ $info->lang }}
								</td>
								<td>
									<a href="{{ route('editQuran', ['id' => $info->id]) }}" class="btn btn-xs btn-info">
										تعديل
									</a>
								</td>
								<td>
									<a href="{{ route('deleteQuran', ['id' => $info->id]) }}" class="btn btn-xs btn-danger">
										حذف
									</a>
								</td>
								
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">لا يوجد تفاسير.</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	</section>
@stop