@extends('layouts.default')

@section('content')
	<div class="col-md-12">
		<div class="page-header">
			<h3>
				{{ $title }}

			</h3>
		</div>
		@include('includes.alert')
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Username</th>
					<th>Paid</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				@foreach($payments as $payment)
					<tr>

						<td>{{ User::where('id','=',$payment->user_id)->first()->username }}</td>

						<td>
							{{$payment->paid_ammount}}
						</td>
						<td>
	        				<a href="{{ URL::route('payment.edit',$payment->user_id)}}" class='btn btn-info btn-sm'>
	        					<span class="glyphicon glyphicon-edit"></span>
	        				</a>
	        			</td>

					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
@stop
