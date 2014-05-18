<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>{{ $title }} | {{ Config::get('myConfig.siteName') }}</title>
	    {{HTML::style('/css/bootstrap.min.css')}}
	    {{ HTML::style('/css/bootstrap3-wysiwyg5.css') }}
	    {{ HTML::style("css/custom.css") }}

	    {{HTML::script('/js/jquery.min.js')}}
	    {{HTML::script('/js/bootstrap.min.js')}}
	    {{HTML::script('/js/bootswatch.js')}}
	    {{ HTML::script('js/wysihtml5-0.3.0.min.js') }}
		{{ HTML::script('js/bootstrap3-wysihtml5.js') }}
		{{ HTML::script('js/custom.js') }}
  </head>
	
	<body>
		@include('includes.topNav')
		<div class="container">
            <div class="row">
                @include('includes.sideNav')
                <div class="col-md-9">
                	<div class="row">
                    	@yield('content')
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </body>
</html>
