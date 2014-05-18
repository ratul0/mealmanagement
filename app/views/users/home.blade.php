@extends('layouts.default')

@section('content')
	<div class="col-md-12">
		<div class="page-header">
			<h2>{{ $title }}</h2>
		</div>
		<h1>Welcome {{ Auth::user()->username }}</h1>
		<p class='btn btn-primary btn-sm pull-right' style="vertical-align: middle;">Current Meal Rate : {{number_format($rate,2)}}</p>
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Username</th>
					<th>Paid</th>
					<th>Total Bazar</th>
					<th>Remaining</th>
					<th>Total Meal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					@if(((User::find($user)->payment->paid_ammount)-(User::find($user)->meal->count)*$rate)<0)
					<tr class="danger">
					@elseif(((User::find($user)->payment->paid_ammount)-(User::find($user)->meal->count)*$rate)<50)
					<tr class="warning">
					@else
					<tr>
					@endif
					

						<td>{{ User::find($user)->username }}</td>

						<td>
							{{User::find($user)->payment->paid_ammount}}
						</td>
						<td>
							{{User::find($user)->bazar->count}}({{User::find($user)->bazar->cost}})
						</td>

						<td>
							{{number_format(((User::find($user)->payment->paid_ammount)-((User::find($user)->meal->count)*$rate)),2)}}
						</td>
						<td>
							{{User::find($user)->meal->count}}
						</td>


					</tr>
					
				@endforeach

				<tr>
						<td></td>
						<td><b>{{Payment::sum('paid_ammount')}}</b></td>
						<td></td>
						<td><b>{{(Total::find(1)->total_money)-(Total::find(1)->total_cost)}}</b></td>
						<td></td>
					</tr>
			</tbody>
		</table>


    </div>
@stop