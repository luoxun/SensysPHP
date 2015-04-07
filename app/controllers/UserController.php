<?php

class UserController extends BaseController {

	public function get_about(){
		return View::make('user.about');
	}

	public function get_article(){
		return View::make('user.article');
	}

	public function get_search(){
		return View::make('user.search');
	}

	public function submit_search(){
		$var = array(
			'query'=>Input::get('search')
		);
		$currentquery = Session::put('searchstate',$var['query']);

		$state = Datadom::where('article','like','%'.$var['query'].'%')->take(10)->get();

		if($state){
			return Redirect::to('search')
				   ->with('datadom',$state)
				   ->with('query',$currentquery);
		}else{
			return Redirect::to('/');
		}
	}
}