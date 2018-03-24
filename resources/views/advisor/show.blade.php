@extends('layouts.main')



@section('content')
<section class="content" style="height: 586px">
	<div class="panel panel-default" style="background-color: white;margin-top: 15px;" >

		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						اسم الداعية
					</th>
					<th>
						رقم الداعية
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
										{{ $info->name }}
								</td>
								<td>
										{{ $info->phone }}
								</td>
								<td>
									<a href="{{ route('editAdvisor', ['id' => $info->id]) }}" class="btn btn-xs btn-info">
										تعديل
									</a>
								</td>
								<td>
									<a href="{{ route('deleteAdvisor', ['id' => $info->id]) }}" class="btn btn-xs btn-danger">
										حذف
									</a>
								</td>
								
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">لا يوجد دعاة.</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	</section>
@stop