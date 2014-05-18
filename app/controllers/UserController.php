<?php

class UserController extends BaseController {

	private function calculateMealRate(){
		$totalCost = Total::find(1)->total_cost;
		$totalMeal = Total::find(1)->total_meal;
		if($totalMeal != 0){
			return $totalCost/$totalMeal;
		}else{
			return 0;
		}
		
	}

	/**
	 * login page
	 * @return void
	 */
	public function login()
	{
		return View::make('users.login')
						->with('title', 'Log In');
	}

	/**
	 * process to login a user
	 * @return void
	 */
	public function doLogin()
	{
		$rules = array
		(
	    	'email' 	=> 'required|email',
	    	'password' 	=> 'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::route('login')
								->withInput()
								->withErrors($validation);
		else
		{
			$credentials = array
			(
				'email'		=>	Input::get('email'),
				'password'	=>	Input::get('password')
			);

			if(Auth::attempt($credentials))
			{
				Session::put('role', Auth::user()->role_id);
			    return Redirect::route('home');
			}
			else
				return Redirect::route('login')
									->withInput()
									->with('error', 'Error in Email Address or Password.');
		}
	}

	/**
	 * logout a user
	 * @return void
	 */
	function logout()
	{
		Auth::logout();
		Session::forget('role');

		return Redirect::route('login')
						->with('success', 'You have been logged out.');
	}

	function home(){
		return View::make('users.home')
						->with('users',User::all()->lists('id'))
						->with('rate',$this->calculateMealRate())
						->with('title', 'Home');
	}

	function guest(){
		return View::make('users.public')
						->with('title', 'Home');
	}

		public function register()
	{
		return View::make('users.register')
						->with('title', 'Register');
	}

	public function doRegister()
	{
		//return Input::all();


	
		$rules = array
		(
	    	'username'	=>	'required|min:3|max:15',
	    	'email' 	=> 'required|email|unique:users',
	    	'password' =>'Required|Confirmed',
			'password_confirmation' =>'Required'
			

		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::route('register')
								->withInput()
								->withErrors($validation);
		else
		{
			
				$user = new User;
				$user->username      = Input::get('username');
				$user->email      = Input::get('email');
				$user->password      = Hash::make(Input::get('password'));
				$user->role_id        = 3;

				if($user->save()){
					$id = User::where('email','=',Input::get('email'))->first()->id;
					Payment::create(['user_id'=> $id]);
					Bazar::create(['user_id'=>$id]);
					Meal::create(['user_id'=>$id]);
					return Redirect::route('home')
			    					->with('success', "Account Created successfully.");
				}
			    
			else
				return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
	}

	public function edit(){
		return View::make('users.edit')
			->with('title','Update Cridentials')
			->with('user',User::where('id','=',Auth::user()->id)->first());
	}

	public function update(){
		$rules = array
		(
	    	'username'	=>	'required|min:3|max:15',	
	    	'password' =>'Required|Confirmed',
			'password_confirmation' =>'Required'
			

		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else
		{
			

			$userUpdate = ['username' => Input::get('username'),
				'password'=>Hash::make(Input::get('password'))
				];

			

			if(User::find(Auth::user()->id)->update($userUpdate)){

				Auth::logout();
				Session::forget('role');

				return Redirect::route('login')
								->with('success', 'Your Cridentials Have Been Changed.');

			}
			    
			else
				return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');

									
		}
	}
}