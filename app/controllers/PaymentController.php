<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /payment
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('payment.index')
						->with('payments',Payment::all())
						->with('title', 'All Payments');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /payment/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /payment
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 * GET /payment/{id}
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
	 * GET /payment/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('payment.edit')
						/*->with('user',User::all()->lists('username','id'))*/
						->with('user',User::find($id))
						->with('title', 'Add Payment');	
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		/*$user_id = Input::get('user_id');
				$paid = Payment::where('user_id','=',$user_id)->first()->paid_ammount;
		dd($paid);*/
		$rules = array
		(
	    	
	    	'amount' 	=> 'required|numeric'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
				$user_id = Input::get('user_id');
				$paid = Payment::where('user_id','=',$user_id)->first()->paid_ammount;
				$paid += Input::get('amount');
				$paymentUpdate = ['paid_ammount'=>$paid];
				

				if(Payment::where('user_id','=',$user_id)->update($paymentUpdate)){
					Total::find(1)->update(['total_money'=>Payment::sum('paid_ammount')]);
					return Redirect::route('payment.index')
			    					->with('success', "Payment Received successfully.");
				}
			    
			else
				return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}