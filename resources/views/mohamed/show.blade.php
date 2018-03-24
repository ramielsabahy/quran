@extends('layouts.main')



@section('content')
<section class="content" style="height: 586px">
	<div class="panel panel-default" style="background-color: white;margin-top: 15px;" >

		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						رابط المعلومة عن سيدنا محمد صلى الله عليه وسلم
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
										<a href="{{ $info->link }}"> اضغط لعرض المعلومة عن سيدنا محمد صلى الله عليه و سلم </a>
								</td>
								<td>
									{{ $info->lang }}
								</td>
								<td>
									<a href="{{ route('editMohamed', ['id' => $info->id]) }}" class="btn btn-xs btn-info">
										تعديل
									</a>
								</td>
								<td>
									<a href="{{ route('deleteMohamed', ['id' => $info->id]) }}" class="btn btn-xs btn-danger">
										حذف
									</a>
								</td>
								
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">لا يوجد معلومات عن سيدنا محمد صلى الله عليه و سلم.</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	</section>
@stop