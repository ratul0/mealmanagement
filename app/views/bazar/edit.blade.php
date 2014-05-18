@extends('layouts.default')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
		</div>
		
      	{{ Form::open(array('route' => 'bazar.edit','method'=>'put')) }}

	        @include('includes.alert')






	        <div class="form-group">
	          	{{ Form::label('cost', 'Cost *') }}
	          	{{ Form::text('cost', '', array('class' => 'form-control')) }}
	          	{{ $errors->first('cost') }}
	        </div>
        	
        	{{Form::hidden('user_id',$user->id)}}
        	{{ Form::submit('Add Cost',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Logging in...')) }}
      	
      	{{ Form::close() }}

    </div>
@stop