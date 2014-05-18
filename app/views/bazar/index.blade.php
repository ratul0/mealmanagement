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
					<th>Cost</th>
					<th>Total Bazar</th>
					<th>Edit</th>
					<th>Add</th>
					<th>Subtract</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bazars as $bazar)
					<tr>

						<td>{{ User::where('id','=',$bazar->user_id)->first()->username }}</td>

						<td>
							{{$bazar->cost}}
						</td>
						<td>
							{{$bazar->count}}
						</td>
						<td>
	        				<a href="{{ URL::route('bazar.edit',$bazar->user_id)}}" class='btn btn-info btn-sm'>
	        					<span class="glyphicon glyphicon-euro"></span>
	        				</a>
	        			</td>

	        			<td>
	        				<a href="{{ URL::route('bazar.add',$bazar->user_id)}}" class='btn btn-success btn-sm'>
	        					<span class="glyphicon glyphicon-plus"></span>
	        				</a>
	        			</td>

	        			<td>
	        				<a href="{{ URL::route('bazar.sub',$bazar->user_id)}}" class='btn btn-danger btn-sm'>
	        					<span class="glyphicon glyphicon-minus"></span>
	        				</a>
	        			</td>

					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
@stop
