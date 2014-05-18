<?php

class BazarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /bazar
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('bazar.index')
						->with('bazars',Bazar::all())
						->with('title', 'All Bazar');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /bazar/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /bazar
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /bazar/{id}
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
	 * GET /bazar/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('bazar.edit')
						/*->with('user',User::all()->lists('username','id'))*/
						->with('user',User::find($id))
						->with('title', 'Add Cost');	
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /bazar/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array
		(
	    	
	    	'cost' 	=> 'required|numeric'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
				$user_id = Input::get('user_id');
				$cost = Bazar::where('user_id','=',$user_id)->first()->cost;
				$cost += Input::get('cost');
				$costUpdate = ['cost'=>$cost];
				

				if(Bazar::where('user_id','=',$user_id)->update($costUpdate)){
					Total::find(1)->update(['total_cost'=>Bazar::sum('cost')]);
					return Redirect::route('bazar.index')
			    					->with('success', "Cost Added successfully.");
				}
			    
			else
				return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /bazar/{id}
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
		$count = Bazar::where('user_id','=',$id)->first()->count;
				$count++;
				$countUpdate = ['count'=>$count];
				

				if(Bazar::where('user_id','=',$id)->update($countUpdate))
			    return Redirect::route('bazar.index')
			    					->with('success', "successful.");
			else
				return Redirect::back()->with('error', 'Some error occured. Try again.');
		
	}

	public function sub($id){
		//return $id;
		$count = Bazar::where('user_id','=',$id)->first()->count;
				$count--;
				$countUpdate = ['count'=>$count];
				

				if(Bazar::where('user_id','=',$id)->update($countUpdate))
			    return Redirect::route('bazar.index')
			    					->with('success', "successful.");
			else
				return Redirect::back()->with('error', 'Some error occured. Try again.');
		
	}

}