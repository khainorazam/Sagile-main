<?php

namespace App\Http\Controllers;
use App\Project;
use App\Team;
use App\Sprint;
use App\UserStory;
use App\Task;
use App\TeamMapping;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //not real index
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
            // $pro = \App\Project::where('id', '=', $id)->get();
            return view('profeature.index',['projects'=>$project->all(), 'pros'=>$pro->all()]);
        }
      
        return view('project.index')->with ('projects',$project->all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $project = new Project;
        // $pro = new Project;
        return view('project.create')
            ->with ('projects',$project->all())
            ->with('title', 'Create Project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $project =new Project();
        $project->proj_name=$request->proj_name;
        $project->proj_desc=$request->proj_desc;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date; 
        
        $validation = $request->validate([
            'proj_name' => 'required|unique:projects',
            'proj_desc' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date'
        ], [
            'proj_name.required' => '*The Project Title is required',
            'proj_name.unique' => '*There is already an existing project with the same name',
            'proj_desc.required' => '*The Description is required',
            'start_date.required' => '*The Start Date is required',
            'end_date.required' => '*The Completion Date is required'
        ]);
        

        $project->save();
        return redirect()->route('profeature.index')
            ->with('success', 'Project has successfully been created! Assign this project in Team to start working on the project!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = new Project();
        return view('profeature.index')->with ('projects',$project->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $user = \Auth::user();
        $pro = \App\Project::where('team_name', '=', $user->team_name)->get();

        return view('project.edit')
        ->with('projects', $pro)
        ->with('project', $project)
        ->with('title', 'Edit ' . $project->proj_name);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $project)
    {
        $project->proj_name=$request->proj_name;
        $project->proj_desc=$request->proj_desc;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date; 
        $project->save(); 
    
        return redirect()->route('profeature.index', $project)
            ->with('success', 'Project has successfully been updated!');

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //deletes the team and team mapping records that are associated with the project
        $team = \App\Team::where('proj_name', $project->proj_name)->first();
        $teammapping = \App\Teammapping::where('team_name', $team->team_name)->delete();
        $team->delete();

        //Get sprints related to project
        $sprints = Sprint::where('proj_name', $project->proj_name)->get();

        foreach ($sprints as $sprint) {
            // Get userstories related to each sprint
            $userstories = UserStory::where('sprint_id', $sprint->sprint_id)->get();
            
            foreach ($userstories as $userstory){
                //Get tasks related to each user story
                $tasks = Task::where('userstory_id', $userstory->u_id)->get();

                // Delete tasks related to the user story
                $tasks->each->delete();

                // Delete the user story
                $userstory->delete();
            }
            
            //Delete the sprint 
            $sprint->delete();
            
        }

        //delete the project record
        $project->delete();

        return redirect()->route('profeature.index', $project)
            ->with('success', 'Project has been deleted successfully');
        
    }
}
