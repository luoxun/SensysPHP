<?php

class LoginController extends \BaseController {

	public function index(){
		return View::make('login');
	}
	
	public function auth(){
		
		$validator = Validator::make(Input::all(),User::$rules);

		if($validator->fails()){
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}else{
			$userdata = array(
				'username'=> Input::get('username'),
				'password'=> Input::get('password')
			);

			if(Auth::attempt($userdata,true)){
				$verifyrole = User::where('username','=',$userdata['username'])->first();
				if($verifyrole->role == "admin"){
					return Redirect::to('master');
				}elseif($verifyrole->role == "user"){
					return Redirect::to('user');
				}else{
					return Redirect::to('login');
				}
			}else{
				return Redirect::to('login');
			}
		}
	}

}