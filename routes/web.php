<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);

		//Route for Coding Standard
		Route::get('codestand', 'CodingStandardController@index')->name('codestand.index');
		Route::get('codestand/create', 'CodingStandardController@create')->name('codestand.create');
		Route::get('codestand/show', 'CodingStandardController@show')->name('codestand.show');
		Route::get('codestand/{codestand}/edit', 'CodingStandardController@edit')->name('codestand.edit');
		Route::post('codestand', 'CodingStandardController@store')->name('codestand.store');
		Route::post('codestand/{codestand}', 'CodingStandardController@update')->name('codestand.update');
		Route::get('codestand/{codestand}/destroy', 'CodingStandardController@destroy')->name('codestand.destroy');

		//Route for role
		Route::get('role', 'RoleController@index')->name('role.index');
		Route::get('role/create', 'RoleController@create')->name('role.create');
		Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit');
		Route::post('role', 'RoleController@store')->name('role.store');
		Route::post('role/{role}', 'RoleController@update')->name('role.update');
		Route::get('role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');

		//Route for feedback
		Route::get('feedback', 'FeedbackController@index')->name('feedback.index');
		Route::get('feedback/create', 'FeedbackController@create')->name('feedback.create');
		Route::get('feedback/{feedback}/edit', 'FeedbackController@edit')->name('feedback.edit');
		Route::post('feedback', 'FeedbackController@store')->name('feedback.store');
		Route::post('feedback/{feedback}', 'FeedbackController@update')->name('feedback.update');
		Route::get('feedback/{feedback}/destroy', 'FeedbackController@destroy')->name('feedback.destroy');

		//Route for security feature
		Route::get('secfeatures', 'SecurityFeatureController@index')->name('secfeature.index');
		Route::get('secfeatures/create', 'SecurityFeatureController@create')->name('secfeature.create');
		Route::get('secfeatures/{secfeature}/edit', 'SecurityFeatureController@edit')->name('secfeature.edit');
		Route::post('secfeatures', 'SecurityFeatureController@store')->name('secfeature.store');
		Route::post('secfeatures/{secfeature}', 'SecurityFeatureController@update')->name('secfeature.update');
		Route::get('secfeatures/{secfeature}/destroy', 'SecurityFeatureController@destroy')->name('secfeature.destroy');

		//Route for Performance Feature
		Route::get('perfeatures', 'PerformanceFeatureController@index')->name('perfeature.index');
		Route::get('perfeatures/create', 'PerformanceFeatureController@create')->name('perfeature.create');
		Route::get('perfeatures/{perfeature}/edit', 'PerformanceFeatureController@edit')->name('perfeature.edit');
		Route::post('perfeatures', 'PerformanceFeatureController@store')->name('perfeature.store');
		Route::post('perfeatures/{perfeature}', 'PerformanceFeatureController@update')->name('perfeature.update');
		Route::get('perfeatures/{perfeature}/destroy', 'PerformanceFeatureController@destroy')->name('perfeature.destroy');

		//Route for Status
		Route::get('status', 'StatusController@index')->name('status.index');
		Route::get('status/create', 'StatusController@create')->name('status.create');
		Route::get('status/{status}/edit', 'StatusController@edit')->name('status.edit');
		Route::post('status', 'StatusController@store')->name('status.store');
		Route::post('status/{status}', 'StatusController@update')->name('status.update');
		Route::get('status/{status}/destroy', 'StatusController@destroy')->name('status.destroy');

		//Route for team
		Route::get('team', 'TeamController@index')->name('team.index');
		Route::get('teams/create', 'TeamController@create')->name('team.create');
		Route::get('teams/show', 'TeamController@show')->name('team.show');
		Route::get('teams/{team}/edit', 'TeamController@edit')->name('team.edit');
		Route::post('teams', 'TeamController@store')->name('team.store');
		Route::post('teams/{team}', 'TeamController@update')->name('team.update');
		Route::get('teams/{team}/destroy', 'TeamController@destroy')->name('team.destroy');

		//Route for user stories
		Route::get('userstory', 'UserStoryController@index')->name('userstory.index');
		Route::get('userstory/create', 'UserStoryController@create')->name('userstory.create');
		Route::get('userstory/{userstory}/edit', 'UserStoryController@edit')->name('userstory.edit');
		Route::post('userstory', 'UserStoryController@store')->name('userstory.store');
		Route::post('userstory/{userstory}', 'UserStoryController@update')->name('userstory.update');
		Route::get('userstory/{userstory}/destroy', 'UserStoryController@destroy')->name('userstory.destroy');

		//Route for sprint
		Route::get('sprint', 'SprintController@index')->name('sprint.index');
		Route::get('sprint/create', 'SprintController@create')->name('sprint.create');
		Route::get('sprint/{sprint}/edit', 'SprintController@edit')->name('sprint.edit');
		Route::post('sprint', 'SprintController@store')->name('sprint.store');
		Route::post('sprint/{sprint}', 'SprintController@update')->name('sprint.update');
		Route::get('sprint/{sprint}/destroy', 'SprintController@destroy')->name('sprint.destroy');

		//Route for task
		Route::get('task', 'TaskController@index')->name('task.index');
		Route::get('task/create', 'TaskController@create')->name('task.create');
		Route::get('task/{task}/edit', 'TaskController@edit')->name('task.edit');
		Route::post('task', 'TaskController@store')->name('task.store');
		Route::post('task/{task}', 'TaskController@update')->name('task.update');
		Route::get('task/{task}/destroy', 'TaskController@destroy')->name('task.destroy');

		//route for project
		Route::get('projects', 'ProjectController@index')->name('project.index');
		Route::get('projects/create', 'ProjectController@create')->name('project.create');
		Route::get('projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
		Route::post('projects', 'ProjectController@store')->name('project.store');
		Route::post('projects/{project}', 'ProjectController@update')->name('project.update');
		Route::get('projects/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');

		//route based on project
		Route::get('project/{id}', 'ProjectController@selectedProject')->name('project.select');
		Route::get('codestand/{id}', 'CodingStandardController@selectedProject')->name('codestand.select');
		Route::get('task/{id}', 'TaskController@selectedProject')->name('task.select');
		Route::get('sprint/{id}', 'SprintController@selectedProject')->name('sprint.select');
		Route::get('userstory/{id}', 'UserStoryController@selectedProject')->name('userstory.select');
		Route::get('team/{id}', 'TeamController@selectedProject')->name('team.select');
		Route::get('status/{id}', 'StatusController@selectedProject')->name('status.select');
		Route::get('perfeatures/{id}', 'PerformanceFeatureController@selectedProject')->name('perfeature.select');
		Route::get('secfeatures/{id}', 'SecurityFeatureController@selectedProject')->name('secfeature.select');
		Route::get('role/{id}', 'RoleController@selectedProject')->name('role.select');

		Route::get('kanbanBoard/{id}', 'HomeController@selectedProject')->name('kb.select');
		Route::get('kanbanBoard', 'HomeController@kbindex')->name('kb.index');
		Route::get('change-status', 'HomeController@changeStatus');
		Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::controller(TwitterController::class)->group(function(){
    Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('auth/twitter/callback', 'handleTwitterCallback');
});

