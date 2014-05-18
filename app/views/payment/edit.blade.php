@extends('layouts.default')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
		</div>
		
      	{{ Form::open(array('route' => 'payment.edit','method'=>'put')) }}

	        @include('includes.alert')






	        <div class="form-group">
	          	{{ Form::label('amount', 'Payment *') }}
	          	{{ Form::text('amount', '', array('class' => 'form-control')) }}
	          	{{ $errors->first('amount') }}
	        </div>
        	
        	{{Form::hidden('user_id',$user->id)}}
        	{{ Form::submit('Receive Payment',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Logging in...')) }}
      	
      	{{ Form::close() }}

    </div>
@stop