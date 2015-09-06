<?php namespace nable\Http\Controllers;

use app\Helpers\Uploader;
use Illuminate\Support\Facades\Session;
use nable\Http\Requests;
use nable\Http\Controllers\Controller;
use nable\Project;

use Illuminate\Http\Request;

class RespondentController extends Controller {

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
	public function create(Request $request)
	{
		$project = Project::find($request->get('project_id'));
		if($request->get('type') == 'create')
		{
			return view('respondents.create', compact('project'));
		}
		elseif($request->get('type') == 'upload')
		{
			return view('respondents.upload', compact('project'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
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

	public function upload(Request $request)
	{
		$respondents = Uploader::csvToRespondents(
			$request->file('file'),
			$request->get('project_id'));

		Session::flash('flash_success', 'Successfully uploaded ' . $respondents . ' new respondent(s).');

		return redirect('/project/' . $request->get('project_id'));
	}

}
