<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SprintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//Route::get('/home', function () {
//    return redirect()->route('tasks.index');
//})->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route for Project Actions
Route::get('projects', 'ProjectController@index')->name('project.index');
Route::get('projects/create', 'ProjectController@create')->name('projects.create');
Route::get('projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
Route::post('projects', 'ProjectController@store')->name('projects.store');
Route::post('projects/{project}', 'ProjectController@update')->name('projects.update');
Route::get('projects/{project}/destroy', 'ProjectController@destroy')->name('projects.destroy');

//Route for sprint
Route::get('sprint', 'SprintController@index')->name('sprints.index');
Route::get('sprint/create', 'SprintController@create')->name('sprints.create');
Route::get('sprint/{sprint_id}/edit', 'SprintController@edit')->name('sprints.edit');
Route::post('sprint', 'SprintController@store')->name('sprints.store');
Route::post('sprint/{sprint}', 'SprintController@update')->name('sprints.update');
Route::post('sprint/{sprint}/destroy', 'SprintController@destroy')->name('sprints.destroy');
Route::get('search','SprintController@search');
Route::post('/update',[SprintController::class, 'update2'])->name('sprint.update');

//Route for Project List
Route::get('profeature', 'ProductFeatureController@index')->name('profeature.index');
//Main Sprint Page
Route::get('profeature/{proj_name}', 'ProductFeatureController@index2')->name('profeature.index2');
// Route::post('profeature/{proj_name}', 'ProductFeatureController@index2')->name('profeature.index2');
Route::get('profeature/userstory/{sprint_id}', 'ProductFeatureController@index3')->name('profeature.index3');
Route::get('profeature/create', 'ProductFeatureController@create')->name('profeature.create');
Route::get('profeature/{profeature}/edit', 'ProductFeatureController@edit')->name('profeature.edit');
Route::get('sprint/{sprint_id}/edit2', 'ProductFeatureController@edit2')->name('profeature.edit2');

//Route for chart
Route::get('chart/{sprint_id}', 'ChartController@index')->name('chart.index');
Route::get('/create-burndown', 'BurndownChartController@create');
// Route::get('/create-burnup', 'BurnupChartController@create');

//Route for team
Route::get('team', 'TeamController@index')->name('team.index');
Route::get('teams/create', 'TeamController@create')->name('teams.create');
Route::get('teams/show', 'TeamController@show')->name('teams.show');
Route::get('teams/{team}/edit', 'TeamController@edit')->name('teams.edit');
Route::post('teams', 'TeamController@store')->name('teams.store');
Route::post('teams/{team}', 'TeamController@update')->name('teams.update');
Route::get('teams/{team}/destroy', 'TeamController@destroy')->name('teams.destroy');
Route::get('teams','TeamController@search');

//Route for Defect Feature
Route::get('deffeature', 'DefectFeatureController@index')->name('deffeature.index');
//Route::get('deffeature/add', 'DefectFeatureController@add')->name('deffeature.add');
Route::get('deffeature/create', 'DefectFeatureController@create')->name('deffeature.create');
Route::get('deffeature/{deffeature}/edit', 'DefectFeatureController@edit')->name('deffeature.edit');
Route::post('deffeature', 'DefectFeatureController@store')->name('deffeature.store');
Route::post('deffeature/{deffeature}', 'DefectFeatureController@update')->name('deffeature.update');
Route::post('deffeature/{deffeature}/destroy', 'DefectFeatureController@destroy')->name('deffeature.destroy');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('tasks', 'TaskController@index')->name('tasks.index');
//     Route::post('tasks', 'TaskController@store')->name('tasks.store');
//     Route::put('tasks/sync', 'TaskController@sync')->name('tasks.sync');
//     Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');
// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::post('statuses', 'StatusController@store')->name('statuses.store');
//     Route::put('statuses', 'StatusController@update')->name('statuses.update');
// });

Route::group(['middleware' => 'auth'], function () {
    Route::get('tasks', 'TaskController@index')->name('tasks.index');
    Route::post('tasks', 'TaskController@store')->name('tasks.store');
    Route::put('tasks/sync', 'TaskController@sync')->name('tasks.sync');
    Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('status', 'StatusController@index')->name('status.index');
    Route::get('statuses/create', 'StatusController@create')->name('statuses.create');
    Route::get('statuses/{status}/edit', 'StatusController@edit')->name('statuses.edit');
    Route::post('status', 'StatusController@store')->name('statuses.store');
    Route::post('statuses', 'StatusController@update')->name('statuses.update');
    Route::get('statuses/{status}/destroy', 'StatusController@destroy')->name('statuses.destroy');  
});

// //Route for status
// Route::get('statuses', 'StatusController@index')->name('status.index');
// Route::get('statuses/create', 'StatusController@create')->name('statuses.create');
// Route::get('statuses/{status}/edit', 'StatusController@edit')->name('statuses.edit');
// Route::post('statuses', 'StatusController@store')->name('statuses.store');
// Route::post('statuses/{status}', 'StatusController@update')->name('statuses.update');
// Route::get('statuses/{status}/destroy', 'StatusController@destroy')->name('statuses.destroy');

//Route for role
Route::get('role', 'RoleController@index')->name('role.index');
Route::get('roles/create', 'RoleController@create')->name('roles.create');
Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
Route::post('roles', 'RoleController@store')->name('roles.store');
Route::post('roles/{role}', 'RoleController@update')->name('roles.update');
Route::get('roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');

//Route for Coding Standard
Route::get('codestand', 'CodingStandardController@index')->name('codestand.index');
Route::get('codestand/create', 'CodingStandardController@create')->name('codestand.create');
Route::get('codestand/show', 'CodingStandardController@show')->name('codestand.show');
Route::get('codestand/{codestand}/edit', 'CodingStandardController@edit')->name('codestand.edit');
Route::post('codestand', 'CodingStandardController@store')->name('codestand.store');
Route::post('codestand/{codestand}', 'CodingStandardController@update')->name('codestand.update');
Route::get('codestand/{codestand}/destroy', 'CodingStandardController@destroy')->name('codestand.destroy');

//Route for attachment
//Route::get('uploadfile','UploadFileController@index')->name('uploadfile.index');
//Route::post('/uploadfile','UploadFileController@showUploadFile');
Route::get('attachment', 'AttachmentController@index')->name('attachment.index');
//Route::get('attachment', 'AttachmentController@index')->name('attachment.index');
Route::get('attachment/create', 'AttachmentController@createForm')->name('attachment.createForm');
Route::post('attachments', 'AttachmentController@fileUpload')->name('attachment.fileUpload');
Route::get('attachments/{attachment}/destroy', 'AttachmentController@destroy')->name('attachments.destroy');

//Route for Team Mapping (Assign Team Member to Team)
//Route::get('teammapping', 'TeamMappingController@index')->name('teammapping.index');

//view team members
Route::get('teammappings/{team_name}', 'TeamMappingController@index')->name('teammapping.index'); 
Route::get('teammappings/{team_name}/create', 'TeamMappingController@create')->name('teammappings.create');
Route::get('teammappings/show', 'TeamMappingController@show')->name('teammappings.show');
Route::get('teammappings/{teammapping_id}/edit', 'TeamMappingController@edit')->name('teammappings.edit');
Route::post('teammappings', 'TeamMappingController@store')->name('teammappings.store');
Route::get('teammappings/{teammapping}/destroy', 'TeamMappingController@destroy')->name('teammappings.destroy');
Route::get('teammappings','TeamMappingController@search')->name('teammappings.search');
Route::get('teammappings', 'TeamMappingController@getUsers');
Route::post('getUsers', 'TeamMappingController@getUsers')->name('getUsers.post');

//Route for user stories
Route::get('userstory', 'UserStoryController@getID')->name('userstory.getID');
Route::get('userstory', 'UserStoryController@index')->name('userstory.index');
Route::get('userstory/create', 'UserStoryController@create')->name('userstory.create');
Route::get('userstory/{userstory}/edit', 'UserStoryController@edit')->name('userstory.edit');
Route::post('userstory', 'UserStoryController@store')->name('userstory.store');
Route::post('userstory/{userstory}', 'UserStoryController@update')->name('userstory.update');
Route::get('userstory/{userstory}/destroy', 'UserStoryController@destroy')->name('userstory.destroy');


//Route for backlog
Route::get('backlogs', 'BacklogController@index')->name('backlogs.index');
Route::get('backlogs/create', 'BacklogController@create')->name('backlogs.create');
Route::get('backlogs/{backlog}/edit', 'BacklogController@edit')->name('backlogs.edit');
Route::post('backlogs', 'BacklogController@store')->name('backlogs.store');
Route::post('backlogs/{backlog}', 'BacklogController@update')->name('backlogs.update');
Route::post('backlogs/{backlog}/destroy', 'BacklogController@destroy')->name('backlogs.destroy');

//Route for Task Assign
//Kanban Board
Route::get('sprint/task', 'TaskController@index')->name('tasks.index'); 
//Main Task Page 
Route::get('task/{u_id}', 'TaskController@index2')->name('tasks.index2');
Route::get('sprint/task/create', 'TaskController@create')->name('tasks.create');
Route::get('task/{task}/destroy', 'TaskController@destroy')->name('tasks.destroy');
//Route::post('tasks', 'TaskController@store2')->name('tasks.store2');

//Route for security feature
Route::get('secfeatures', 'SecurityFeatureController@index')->name('secfeature.index');
Route::get('secfeatures/create', 'SecurityFeatureController@create')->name('secfeature.create');
Route::get('secfeatures/{secfeature}/edit', 'SecurityFeatureController@edit')->name('secfeature.edit');
Route::post('secfeatures', 'SecurityFeatureController@store')->name('secfeature.store');
Route::post('secfeatures/{secfeature}', 'SecurityFeatureController@update')->name('secfeature.update');
Route::get('secfeatures/{secfeature}/destroy', 'SecurityFeatureController@destroy')->name('usesecfeature.destroy');

//Route for Performance Feature
Route::get('perfeatures', 'PerformanceFeatureController@index')->name('perfeature.index');
Route::get('perfeatures/create', 'PerformanceFeatureController@create')->name('perfeature.create');
Route::get('perfeatures/{perfeature}/edit', 'PerformanceFeatureController@edit')->name('perfeature.edit');
Route::post('perfeatures', 'PerformanceFeatureController@store')->name('perfeature.store');
Route::post('perfeatures/{perfeature}', 'PerformanceFeatureController@update')->name('perfeature.update');
Route::get('perfeatures/{perfeature}/destroy', 'PerformanceFeatureController@destroy')->name('perfeature.destroy');



//Route for delete Mapping
Route::post('mapping/destroy', 'MappingController@destroy')->name('mapping.destroy');

