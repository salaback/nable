<?php namespace nable\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use nable\Http\Requests;
use nable\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function home()
	{
		$user = Auth::user();

		return view('home.home', compact('user'));
	}

}
