<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>{{$title}}</title>
	    {{HTML::style('/css/bootstrap.min.css')}}
	    <!-- {{HTML::style('/css/bootswatch.min.css')}} -->
	    <!-- {{HTML::style('/css/main.css')}} -->
	    {{HTML::script('/js/jquery.min.js')}}
	    {{HTML::script('/js/bootstrap.min.js')}}
	    {{HTML::script('/js/bootswatch.js')}}
  </head>
	
	<body>
        @include('includes.topNav')
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
            @include('includes.footer')
        </div>
    </body>
</html>
