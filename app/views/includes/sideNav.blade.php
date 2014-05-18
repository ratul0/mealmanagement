

<div class="col-md-3">

	<div class="list-group">
		{{ link_to_route('home', 'Members',$parameters=[],$attributes = ["class"=>"list-group-item"]) }}
		{{ link_to_route('payment.index', 'Payment',$parameters=[],$attributes = ["class"=>"list-group-item"]) }}
		{{ link_to_route('meal.index', 'Meal',$parameters=[],$attributes = ["class"=>"list-group-item"]) }}
		{{ link_to_route('bazar.index', 'Bazar',$parameters=[],$attributes = ["class"=>"list-group-item"]) }}
	</div>
</div>