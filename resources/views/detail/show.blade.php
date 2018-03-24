@extends('layouts.main')



@section('content')
<section class="content" style="height: 586px">
	<div class="panel panel-default" style="background-color: white;margin-top: 15px;" >

		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						لغة الدعوة
					</th>
					<th>
						رابط الدعوة
					</th>
					<th>
						تعديل
					</th>
					<th>
						حذف
					</th>
				</thead>
				<tbody>
					@if($invitations->count() > 0)
						@foreach($invitations as $invitation)
							<tr>
								<td>
										{{ $invitation->language }}
								</td>
								<td>
										{{ $invitation->text }}
								</td>
								<td>
									<a href="{{ route('editDetailInvitation', ['id' => $invitation->id]) }}" class="btn btn-xs btn-info">
										تعديل
									</a>
								</td>
								<td>
									<a href="{{ route('deleteDetailInvitation', ['id' => $invitation->id]) }}" class="btn btn-xs btn-danger">
										حذف
									</a>
								</td>
								
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">لا يوجد دعوات.</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	</section>
@stop