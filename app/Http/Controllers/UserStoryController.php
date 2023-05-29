<?php

namespace App\Http\Controllers;
use App\Priority;
use App\UserStory;
use App\Status;
use App\SecurityFeature;
use App\PerformanceFeature;
use App\Project;
use App\Role;
use App\Mapping;
use App\Team;
use App\TeamMapping;
use App\Sprint;
use App\Task;
use App\Http\Controllers\Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $project = new Project;
        if (\Auth::check())
        {
            $id = \Auth::user()->getId();
            
        }
        if($id)
        {
            $pro = \App\Project::where('user_id', '=', $id)->get();
            return view('profeature.index',['projects'=>$project, 'pros'=>$pro]);
        }
        $
        $userstory = new UserStory;
        // $userstory->$userstory.secfeature;
        // $userstory->$userstory.perfeature;
        // public function index(perfeature, secfeature)
        return view('userstory.index',['userstories'=>$userstory->all(),'projects'=>$project->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getID()
    {
        $parameters = \Request::segment(3);
        return $parameters;
    }

    public static function getID2()
    {
        $parameters = \Request::segment(2);
        return $parameters;
    }
    
    public function create($sprint_id)
    {
        $user = \Auth::user();
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        $project = Project::where('proj_name', $sprint->proj_name)->first();
        $team = Team::where('proj_name', $sprint->proj_name)->first();
        $roles = TeamMapping::where('team_name', $team->team_name)->distinct('role_name')->pluck('role_name');

        //send the existing statuses for the project related   
        $status = Status::where('project_id', $project->id)->get();
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();
        
        //get related sprint with the user story
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        
        return view('userstory.create',['perfeatures'=> $perfeature->all(), 'secfeatures'=> $secfeature->all()])
            ->with('title', 'Create User Story for '. $sprint->sprint_name)
            ->with('sprint_id', $sprint_id)
            ->with('statuses', $status)
            ->with('roles', $roles);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get the current sprint involved
        $sprint = Sprint::where('sprint_id', $request->sprint_id)->first();
        $project = Project::where('proj_name', $sprint->proj_name)->first();

        //Validate the request parameters
        $validation = $request->validate([
            'user_story' => 'required|unique:user_stories,user_story,NULL,id,sprint_id,'.$request->input('sprint_id'), 
            'means' => 'required',
            'title' => 'required',
            'role' => 'required',
        ], [
            'user_story.required' => '*The User Story Name is required',
            'user_story.unique' => '*There is already an existing User Story in the sprint with the same name',
            'means.required' => '*The means is required',
            'role.required' => '*The role is required',
            'title.required' => '*The Status is required',
        ]);

        //Assign request values to new Userstory 
        $userstory = new UserStory;
        $userstory->user_story = $request->user_story;
        $userstory->title = $request->title;

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        
        $userstory->sprint_id = $request->sprint_id;
        $userstory->proj_id = $project->id;
        $userstory->save();

        //redirect to index3 page
        $sprint_id = $request->sprint_id;
        $userstory = UserStory::where('sprint_id', $sprint_id)->get();

        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstory)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story has successfully been created!');
            
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
    */
        
    public function show(UserStory $userStory)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */

    public function edit(UserStory $userstory, $id =[])
    { 
        $user = \Auth::user();
        
        $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->first();
        $project = Project::where('proj_name', $sprint->proj_name)->first();

        //send the existing statuses for the project related   
        $status = Status::where('project_id', $project->id)->get();
        
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();

        $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->first();

        return view('userstory.edit',['secfeatures'=>$secfeature->all(), 'perfeatures'=>$perfeature->all()])
            ->with('title', 'Edit Userstory - "' . $userstory->user_story . '" in '. $sprint->sprint_name)    
            ->with('userstory', $userstory)
            ->with('statuses', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, UserStory $userstory)
    {
        //Validate the request parameters
        $validation = $request->validate([
            // 'means' => 'required',
            'title' => 'required',
        ], [
            // 'means.required' => '*The Description is required',
            'title.required' => '*The Status is required',
        ]);

        //Assign request values to current Userstory 
        //user_story name and sprint ID not included because does not change
        // $userstory->means = $request->means;
        $userstory->title = $request->title;

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        

        //redirect to index3 page
        $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->first();
        $project = Project::where('proj_name', $sprint->proj_name)->first();
        $userstory->proj_id = $project->id;
        $userstory->save();

        $sprint_id = $sprint->sprint_id;
        $userstories = UserStory::where('sprint_id', $sprint_id)->get();

        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstories)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story - ' . $userstory->user_story . ' has successfully been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStory $userstory)
    {
        //condition for user story with no sprint ID which means it is from Project Backlog
        if($userstory->sprint_id != null){
        $sprint_id = $userstory->sprint_id;
        $userstories = UserStory::where('sprint_id', $sprint_id)->get();
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();

        //get task related to user story
        $tasks = Task::where('userstory_id', $userstory->u_id)->get();
        
        //deletes user stories and all task related to user stories
        $tasks->delete();
        $userstory->delete();

        
        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstories)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story has successfully been deleted!');
        }
        
        else{
        //redirect to backlog index page
        $userstories = \App\UserStory::where('proj_id', $userstory->proj_id)
            ->where('title', 'Backlog')
            ->get();
        
        $project = Project::where('id', $userstory->proj_id)->first();

        // Get tasks related to the user story
        $tasks = Task::where('userstory_id', $userstory->u_id)->get();

        // Delete tasks related to the user story
        $tasks->each->delete();

        // Delete the user story
        $userstory->delete();


        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        return redirect()->route('backlog.index', ['proj_id' => $project->id])
            ->with('project', $project)
            ->with('userstories', $userstories)
            ->with('pros', $pro)
            ->with('title', 'Backlog for ' . $project->proj_name)
            ->with('success', 'Backlog has successfully been deleted!');
        }
    }

    //Backlog in Project Page -- START
    public function createBacklog($proj_id)
    {
        $user = \Auth::user();
        $project = Project::where('id', $proj_id)->first();
        $team = Team::where('proj_name', $project->proj_name)->first();
        $roles = TeamMapping::where('team_name', $team->team_name)->distinct('role_name')->pluck('role_name');

        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();
        
        return view('backlog.create',['perfeatures'=> $perfeature->all(), 'secfeatures'=> $secfeature->all()])
            ->with('title', 'Create Backlog for '. $project->proj_name)
            ->with('proj_id', $proj_id)
            ->with('roles', $roles);

    }

    public function storeBacklog(Request $request)
    {
        //Get the current project involved
        $project = Project::where('id', $request->proj_id)->first();

        //Validate the request parameters
        $validation = $request->validate([
            'user_story' => 'required|unique:user_stories,user_story,NULL,id,sprint_id,'.$request->input('sprint_id'), 
            'means' => 'required',
            'role' => 'required',
        ], [
            'user_story.required' => '*The User Story Name is required',
            'user_story.unique' => '*There is already an existing User Story in the sprint with the same name',
            'means.required' => '*The means is required',
            'role.required' => '*The role is required',
        ]);

        //Assign request values to new Userstory 
        $userstory = new UserStory;
        $userstory->user_story = $request->user_story;
        $userstory->title = "Backlog";

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        
        $userstory->proj_id = $project->id;
        $userstory->save();

        //redirect to backlog index page
        $userstory = \App\UserStory::where('proj_id', $project->id)
            ->where('title', 'Backlog')
            ->get();

        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        return redirect()->route('backlog.index', ['proj_id' => $project->id])
            ->with('project', $project)
            ->with('userstories', $userstory)
            ->with('pros', $pro)
            ->with('title', 'Backlog for ' . $project->proj_name)
            ->with('success', 'Backlog has successfully been created!');
            
    }

    public function editBacklog(UserStory $userstory, $id =[])
    { 
        $user = \Auth::user();
        
        $project = Project::where('id', $userstory->proj_id)->first();
        
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();

        return view('backlog.edit',['secfeatures'=>$secfeature->all(), 'perfeatures'=>$perfeature->all()])
            ->with('title', 'Edit Backlog - "' . $userstory->user_story . '" in '. $project->proj_name)    
            ->with('userstory', $userstory);
    }

    public function updateBacklog(Request $request, UserStory $userstory)
    {
        //Validate the request parameters
        // $validation = $request->validate([
        //     // 'means' => 'required',
        //     'title' => 'required',
        // ], [
        //     // 'means.required' => '*The Description is required',
        //     'title.required' => '*The Status is required',
        // ]);

        //Assign request values to current Userstory 
        //user_story name and sprint ID not included because does not change
        // $userstory->means = $request->means;
        // $userstory->title = $request->title;

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        
        $userstory->save();

        //Get current project
        $project = Project::where('id', $userstory->proj_id)->first();

        //redirect to backlog index page
        $userstories = \App\UserStory::where('proj_id', $project->id)
            ->where('title', 'Backlog')
            ->get();

        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        return redirect()->route('backlog.index', ['proj_id' => $project->id])
            ->with('project', $project)
            ->with('userstories', $userstories)
            ->with('pros', $pro)
            ->with('title', 'Backlog for ' . $project->proj_name)
            ->with('success', 'Backlog - ' . $userstory->user_story . ' has successfully been updated!');

    }
    //END BACKLOG FOR PROJECT 

    //BACKLOG FOR USERSTORY
    public function backlog($sprint_id)
    {
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        //Get current project 
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        $project = Project::where('proj_name', $sprint->proj_name)->first();
        
        $userstory = \App\UserStory::where('proj_id', $project->id)
            ->where('title', 'Backlog')
            ->whereNull('sprint_id')
            ->get();

        return view('userstory.backlog',['userstories'=>$userstory,])
            ->with('project', $project)
            ->with('sprint_id', $sprint_id)
            ->with('pros', $pro)
            ->with('title', 'Assign Backlog from ' . $project->proj_name. ' to ' . $sprint->sprint_name);
    }


    public function assignUserstory($sprint_id, UserStory $userstory)
    {
        $userstories = UserStory::where('sprint_id', $sprint_id)->get();
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        
        $userstory->sprint_id = $sprint_id;
        $userstory->save();
        
        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstories)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story has successfully been assigned from Backlog!');
    }

    //END BACKLOG FOR USERSTORY

}

       