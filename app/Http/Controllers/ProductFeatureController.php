<?php
//Controller for Project List, Sprint

namespace App\Http\Controllers;
use App\Project;
use App\TeamMapping;
use App\Sprint;
use App\User;
use App\UserStory;
use App\ProductFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Projects List Page
    public function index(User $id, Project $project)
    {

        $project = new Project();
        if (\Auth::check())
        {
            $id = \Auth::user()->getId();
            
        }
        if($id)
        {   //get the project where user's team name(s) is the same with project's team name
            $user = \Auth::user();
            $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
            $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array


            return view('profeature.index')
                ->with('pros', $pro)
                ->with('title', 'Project');

        }
        return view('project.index',['projects'=>$project->all(), 'pros'=>$pro->all()]);
            
    }

    //Main Sprint Page 
    public function index2($proj_name)
    {
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array


        //Gets the current project
        $project = Project::where('proj_name', $proj_name)->first();

        //Gets all the sprints related to the project
        $sprint = Sprint::where('proj_name', '=', "$proj_name")->get(); 

        return view('profeature.index2')
            ->with('title', 'Sprints for ' . $proj_name)
            ->with('sprints', $sprint)
            ->with('pros', $pro)
            ->with('projects', $project);
    }

    //Main UserStory Page 
    public function index3($sprint_id)
    {
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        //Get current sprint 
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        
        $userstory = \App\UserStory::where('sprint_id', '=', $sprint_id)->get();
        return view('profeature.index3',['userstories'=>$userstory,])
            ->with('sprint_id', $sprint->sprint_id)
            ->with('pros', $pro)
            ->with('title', 'User Story for ' . $sprint->sprint_name);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    public function edit2()
    {
        $project = new Project;
        $status = new Status;
        return view('userstory.edit',['statuses'=>$status->all(),'userstory'=>$userStory, 'projects'=>$project->all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFeature $productFeature)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFeature $productFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */

}
