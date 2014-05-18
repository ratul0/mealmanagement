<?php

class MealController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /meal
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('meal.index')
						->with('meals',Meal::all())
						->with('title', 'All Meals');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /meal/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /meal
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /meal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /meal/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /meal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /meal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function add($id){
		//return $id;
		$count = Meal::where('user_id','=',$id)->first()->count;
				$count++;
				$countUpdate = ['count'=>$count];
				

				if(Meal::where('user_id','=',$id)->update($countUpdate))
			    return Redirect::route('meal.index')
			    					->with('success', "successful.");
			else
				return Redirect::back()->with('error', 'Some error occured. Try again.');
		
	}


	public function sub($id){
		//return $id;
		$count = Meal::where('user_id','=',$id)->first()->count;
				$count--;
				$countUpdate = ['count'=>$count];
				

				if(Meal::where('user_id','=',$id)->update($countUpdate))
			    return Redirect::route('meal.index')
			    					->with('success', "successful.");
			else
				return Redirect::back()->with('error', 'Some error occured. Try again.');
		
	}

	public function addAll(){
		//dd(Payment::sum('paid_ammount'));
		$allusers = Meal::all();
		foreach ($allusers as $user) {

			$count = $user->count;
			$count++;
			$countUpdate = ['count'=>$count];
			Meal::where('user_id','=',$user->user_id)->update($countUpdate);
			Total::find(1)->update(['total_meal'=>Meal::sum('count')]);
		}
		return Redirect::back();
	}

	public function subAll(){
		$allusers = Meal::all();
		foreach ($allusers as $user) {

			$count = $user->count;
			$count--;
			$countUpdate = ['count'=>$count];
			Meal::where('user_id','=',$user->user_id)->update($countUpdate);
			Total::find(1)->update(['total_meal'=>Meal::sum('count')]);
		}
		return Redirect::back();
	}


}