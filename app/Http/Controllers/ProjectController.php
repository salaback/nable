<?php namespace nable\Http\Controllers;

use app\Helpers\Cleaner;
use nable\Http\Requests;
use nable\Http\Controllers\Controller;

use Illuminate\Http\Request;
use nable\Organization;
use nable\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectController extends Controller {

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
		$org = Organization::find($request->get('org_id'));
		// TODO Test if authed user is in the org
		return view('projects.create', compact('org'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$proj_array = $request->get('project');
		$project = Project::create($proj_array);
		$project->members()->attach($proj_array['team']);
		$table_name = Cleaner::name($project->name) . '_' . $project->organization->id;
		$project->table_name = $table_name;
		$project->save();
		Schema::create($table_name, function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('respondent_id');
			$table->timestamps();
		});

		return redirect('/project/' . $project->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);

		return view('projects.show', compact('project'));
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
