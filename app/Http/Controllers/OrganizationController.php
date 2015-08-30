<?php namespace nable\Http\Controllers;

use nable\Http\Requests;
use nable\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nable\Organization;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('organizations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Load current user
		$user = Auth::user();

		// Create organization
		$org = Organization::create($request->get('organization'));

		// Attache org to user
		$org->user_id = $user->id;

		// Set Org Owner
		$org->members()->attach($user);

		//Save Org
		$org->save();

		//Redirect to home

		return redirect('/');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$org = Organization::find($id);

		return view('organizations.show', compact('org'));
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
