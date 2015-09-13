<?php namespace nable\Http\Controllers;

use app\Helpers\Cleaner;
use app\Helpers\Permissions;
use app\Helpers\Tables;
use League\Flysystem\Exception;
use nable\Http\Requests;
use nable\Http\Controllers\Controller;

use Illuminate\Http\Request;
use nable\Project;
use nable\Question;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\HttpFoundation\Session\Session;

class QuestionController extends Controller {

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		try {
			// pull question object
			$question = Question::create($request->get('question'));

			// clean the question name for db naming
			$qname = Cleaner::name($question->name);

			// pull project object
			$project = $question->topic->project;

			// add question field to project table
			Tables::createDataField($project->table_name, $question->type, $qname);
		}
		catch(Exception $e)
		{
			return $e;
		}
		finally
		{
			// return single list group line to ajax requests
			return view('includes.question', compact('question'));
		}


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
		$question = Question::find($id);
		if(Permissions::hasPermission($question->topic->project_id))
		{
			$question->destroy($id);
			return response('deleted', 200);
		}
		else
		{
			return response('permission denied', 500);
		}

	}

}
