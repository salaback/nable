<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DashboardController@home');

Route::post('upload/respondents', 'RespondentController@upload');

Route::controller('toot/smsquery', '\smsquery\RouteController');

//Route::controller('/ti/{ti_id?}/', function($ti_id)
//{
//	dd('\\' . $ti->toot->namespace . '\RouteController');
//	$ti = \nable\TootInstance::find($ti_id);
//
//	return '\\' . $ti->toot->namespace . '\RouteController';
//});

Route::resources([
	'organization' =>'OrganizationController',
	'project' => 'ProjectController',
	'topic' => 'TopicController',
	'question' => 'QuestionController',
	'response' => 'ResponseController',
	'respondent' => 'RespondentController'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
