<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function prizes()
	{
		return view('pages.prizes');
	}

	public function winners()
	{
		return view('pages.prizes');
	}

	public function terms()
	{
		return view('pages.terms');
	}
}
