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
					<th>Total Meal</th>
					<th>
						Add(
						<a href="{{ URL::route('meal.add.all')}}" class='btn btn-success btn-xs'>
	        					<span class="glyphicon glyphicon-plus"></span>
	        			</a>)
					</th>
					<th>
						Subtract(
						<a href="{{ URL::route('meal.sub.all')}}" class='btn btn-danger btn-xs'>
	        					<span class="glyphicon glyphicon-minus"></span>
	        			</a>)
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($meals as $meal)
					<tr>

						<td>{{ User::where('id','=',$meal->user_id)->first()->username }}</td>


						<td>
							{{$meal->count}}
						</td>


	        			<td>
	        				<a href="{{ URL::route('meal.add',$meal->user_id)}}" class='btn btn-success btn-sm'>
	        					<span class="glyphicon glyphicon-plus"></span>
	        				</a>
	        			</td>

	        			<td>
	        				<a href="{{ URL::route('meal.sub',$meal->user_id)}}" class='btn btn-danger btn-sm'>
	        					<span class="glyphicon glyphicon-minus"></span>
	        				</a>
	        			</td>

					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
@stop
