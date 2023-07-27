<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as BaseController;
use App\Http\Resources\ProjectResource as ProjectResource;
use App\Http\Resources\UserstoryResource as UserstoryResource;
use Laravel\Passport\Token;
use Validator;
use Exception;
use App\User;
use App\TeamMapping;
use App\Project;
use App\Status;
use App\UserStory;
use App\Task;
use App\Sprint;

class APIProjectController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        try {
            error_log('API Project index');
            $user = auth('api')->user();
            $teammapping = TeamMapping::where('username', $user->username)->get();

            $projects = new Collection();
            foreach ($teammapping as $team) {
                $project = Project::where('team_name', $team->team_name)->get();
                if(count($project) > 0){
                    $project = $project[0];

                    $userstories = UserStory::where('proj_id', $project->id)->get();
                    // error_log('$userstories');
                    // error_log($userstories);
                    if(count($userstories) > 0){
                        $userstories = $userstories->map(function($userstory){
                            $tasks = Task::where('userstory_id', $userstory->u_id)->get();
                            if(count($tasks) > 0){
                                $userstory['tasks'] = $tasks;
                            }
                            else {
                                $userstory['tasks'] = [];
                            }

                            // $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->get();
                            // if(count($sprint) > 0){
                            //     $userstory['sprint'] = $sprint;
                            // }
                            // else {
                            //     $userstory['sprint'] = null;
                            // }
                            return $userstory;
                        });
                        $project['userstories'] = $userstories;
                    }
                    else {
                        $project['userstories'] = [];
                    }

                    // $sprints = Sprint::where('proj_name', $project->proj_name)->get();
                    // if(count($userstories) > 0){
                    //     $project['sprints'] = $sprints;
                    // }
                    // else {
                    //     $project['sprints'] = [];
                    // }

                    $projects = $projects->push($project);
                }
            }
            error_log($projects);
            return $this->sendResponse(ProjectResource::collection($projects), 'Projects retrieved successfully.');
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $project = Project::create($input);

        return $this->sendResponse(new ProjectResource($project), 'Project created successfully.');
    } 

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return $this->sendError('Project not found.');
        }

        return $this->sendResponse(new ProjectResource($project), 'Project retrieved successfully.');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            // error_log(print_r($input));
            // error_log($input);

            $validator = Validator::make($input, [
                'mode' => 'required',
                'title' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }

            if($input['mode'] == 'project'){
                error_log('Project');
                $project = Project::find($id);
                $project->proj_name = $input['title'];
                $project->proj_desc = isset($input['description']) 
                    ? $input['description'] 
                    : '';
                
                $project->start_date = isset($input['start_date']) 
                    ? $input['start_date'] 
                    : null;
    
                $project->end_date = isset($input['end_date']) 
                    ? $input['end_date'] 
                    : null;
                    
                $statuses = isset($input['statuses']) 
                    ? json_decode($input['statuses'], true) 
                    : array();
    
                $statuses = collect($statuses)->map(function ($status) use ($project) {
                    $isNew = isset($status['id']);
                    $model = null;
                    if($isNew){
                        $model = Status::find($status['id']);
                        $model->title = $status['title'];
                        $model->slug = strtolower(Str::slug($status['title'], "-"));
                        $model->order = $status['order'];
                        $model->save();
                    }
                    else {
                        $model = new Status;
                        $model->title = $status['title'];
                        $model->slug = strtolower(Str::slug($status['title'], "-"));
                        $model->order = $status['order'];
                        $model->project_id = $project->id;
                        $model->save();
                    }
                    return (object) $model->only(['id', 'order', 'slug', 'title', 'project_id']);
                });
        
                $missing_statuses = collect($project->statuses->map(fn($s) => $s->id)
                    ->diff($statuses->map(fn($s) => $s->id))->all())
                    ->map(fn ($id) => Status::destroy($id));

                $userstories = isset($input['userstories']) 
                    ? json_decode($input['userstories'], true) 
                    : array();
                    
                $userstories = collect($userstories)->map(function ($userstory) use ($project) {
                    $isNew = isset($userstory['id']);
                    $model = new Userstory;
                    if($isNew){
                        $model->title = $userstory['title'];
                        $model->status_id = $userstory['status'];
                        $model->project_id = $project->id;
                        // $model->save();
                    }
                    return $model->only(['id', 'title', 'status', 'project_id']);
                });
                error_log(print_r($userstories, true));

                $missing_userstories = collect($project->userstories->map(fn($us) => $us->id)
                    ->diff($userstories->map(fn($us) => $us->id))->all())
                    ->map(fn ($usId) => Userstory::destroy($usId));
                error_log(print_r($missing_userstories, true));

                $project->save();
                return $this->sendResponse(new ProjectResource($project), 'Project updated successfully.');
            }
            else if($input['mode'] == 'userstory'){
                error_log('Userstory');
                $isNew = isset($userstory['id']);

                $userstory = Userstory::find($id);
                error_log($userstory);
                $userstory->user_story = $input['title'];
                $userstory->status_id = $input['status'];
                $userstory->save();

                $userstory->status = Status::find($input['status']);
                
                $tasks = isset($input['tasks']) 
                    ? json_decode($input['tasks'], true) 
                    : array();
                
                $tasks = collect($tasks)->map(function ($task) use ($userstory) {
                    $isNotNew = isset($task['id']);
                    $model = new Task;
                    $user = auth('api')->user();
                    if($isNotNew){
                        $model = Task::find($task['id']);
                    }
                    $model->order = $task['order'];
                    $model->title = $task['title'];
                    $model->start_date = $task['startDate'];
                    $model->end_date = $task['endDate'];
                    $model->status_id = $task['status'];
                    $model->userstory_id = $userstory->u_id;
                    $model->proj_id = $userstory->proj_id;
                    // temp sprint since sprint is not implemented
                    $model->sprint_id = 0;
                    $model->user_name = $user->username;
                    $model->save();
                    return (object) $model->only(['id', 'order', 'title', 'start_date', 'end_date', 'status_id', 'userstory_id', 'proj_id']);
                });
                
                $missing_tasks = collect(Task::where('userstory_id', $userstory->u_id)->get()
                    ->map(fn($t) => $t->id)
                    ->diff($tasks->map(fn($t) => $t->id))->all())
                    ->map(fn ($id) => Task::destroy($id));
                // error_log(print_r($missing_tasks, true));
                
                $userstory->tasks = $tasks;
                return $this->sendResponse(new UserstoryResource($userstory), 'User story updated successfully.');
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
        
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'mode' => 'required',
            ]);

            if($input['mode'] == 'userstory'){
                $userstory = Userstory::find($id);
                $userstory->delete();
                $userstory->status = Status::find($userstory->status_id);
                return $this->sendResponse(new UserstoryResource($userstory), 'Userstory deleted successfully.');
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
}