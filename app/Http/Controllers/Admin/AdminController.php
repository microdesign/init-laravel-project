<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 6/1/15
 * Time: 17:19
 */

namespace App\Http\Controllers\Admin;

use App\Classes\Messages;
use Auth;
use Redirect;
use Session;

class AdminController extends Controller {

	public function __construct( )
	{
		\Config::set( 'auth.model', 'App\Admin');
		\Config::set( 'auth.table', 'admins' );
		
		parent::__construct();
	}
	
	public function show_login()
	{
		return view('admin/login');
	}
	
	public function login()
	{
		$data = array(
			'email'		=> \Input::get('email'),
			'password'	=> \Input::get('password'),
		);

		if (Auth::attempt($data) )
		{
			Messages::set(array('success' => 'Successful login'));
			Session::set('is_admin', TRUE);
			return Redirect::to('administrator');
		}
		else
		{
			Messages::set(array('danger' => 'No user'));
			
			return Redirect::to('admin');
		}
	}
	
	public function administrator()
	{
		if ( ! Session::has('is_admin') OR ! Auth::check())
		{
			return Redirect::to( '/' );
		}	
		
		$users = User::all()->count();
		
		return view( 'admin.administrator', [
			'users'     => $users,
		]);
	}

}
