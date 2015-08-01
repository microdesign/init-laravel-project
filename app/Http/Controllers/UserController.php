<?php namespace App\Http\Controllers;

use App\Classes\Messages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;

class UserController extends Controller {

	use ResetsPasswords;
	
	public $redirectPath = '';

	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		parent::__construct();
		
		$this->auth = $auth;
		$this->passwords = $passwords;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		
		return view('auth/login');
	}

	public function getRegister()
	{
		return view('auth/register');
	}
	
	//*==================*//

	public function postLogin()
	{
		$loginData = [
			'email' => \Input::get('email'),
			'password' => \Input::get('password'),
		]; 
		
		if ( \Auth::attempt($loginData) ) 
		{
			Messages::set([
				'success' => \Lang::get('messages.logged_successful')
			]);

			return \Redirect::to( '/');
		}
		else
		{
			Messages::set([
				'danger' => \Lang::get('messages.logged_error')
			]);

			return \Redirect::back()
				->withInput(\Input::except('password'));
		}
	}

	public function postRegister(StoreUserRequest $request)
	{
		# $request validated in Request validator 
		
		User::create( [
			'name'      => $request->get('first_name'). ' '.$request->get('last_name'),
			'email'     => $request->get('email'),
			'password'  => \Hash::make($request->get('password')),
			'phone'     => $request->get('phone'),
		]);
	}

}
