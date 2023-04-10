<?php

namespace App\Http\Controllers;
use App\Project;
use App\Team;
use App\User;
use App\Role;
use App\TeamMapping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $user = \Auth::user();

        $projects = \App\Project::where('team_name', '=', $user->team_name)->get();

        $team = new Team;

        return view ('team.index', ['teams'=>$team->all(), 'projects'=>$projects->all()]);
    }
    
    public function create()
    {
        $user = \Auth::user();

        $team = new Team;
        // $role = new Role;

        // Retrieve the projects with team_name == null 
        $project = Project::whereNull('team_name')->get();
        
        return view('team.create')
            ->with('teams',$team->all())
            ->with('project', $project->all());
    }
    
    public function store(Request $request)
    {
        $validation = $request->validate([

            'team_name' => 'required|unique:teams',
            'proj_name' => 'required',
        ],
        [
            'team_name.required' => '*The Team Name is required',
            'proj_name.unique' => '*There is already an existing team with the same name',
            'proj_name.required' => '*The Project Name is required',
        ]);


        $user = \Auth::user();
        $team =new Team();
        

        $team->team_name = $request->team_name;
        $team->proj_name = $request->proj_name;

        $project = Project::where('proj_name', $request->proj_name)->first();
        $project->team_name = $request->team_name;

        $project->save();
        $team->save();
        return redirect()->route('team.index')->with('success', 'Team has successfully been created!');
    }

    public function show(Team $team)
    {
        $team = new Team();
        return view('team.show')->with ('teams',$team->all());
    }

    public function edit(Team $team)
    {
        $user = \Auth::user();

        $project = new Project; 

        // Retrieve the projects associated with the current user
        $project = Project::where('user_id', $user->id)->get();
        
        return view('team.edit')
            ->with('project', $project)
            ->with('team', $team);
    }

    public function update(Request $request, Team $team)
    {
        $user = \Auth::user();

        $project = new Project();
        $project = Project::where('user_id', $user->id)->first();
       
        $project->team_name = $request->team_name;
        
        $team->team_name = $request->team_name;
        $team->proj_name = $request->proj_name;
        
        $project->save();
        $team->save(); 
    
        return redirect()->route('team.index', $team)
            ->with('success', 'Team has successfully been updated!');

    }

    public function destroy(Team $team)
    {
        //when delete a team, change the project associated's team_name to null; 
        $project = \App\Project::where('team_name', $team->team_name)->first();
        $project->team_name = null;
        $project->save();

        //delete all the team mappings associated with this team
        $teammapping = \App\Teammapping::where('team_name', $team->team_name)->delete();

        $team->delete();
        return redirect()->route('team.index', $team)
            ->with('success', 'Team has been deleted successfully');

    }
}
