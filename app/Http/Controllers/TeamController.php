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
        $project = new Project();
        $team = new Team;
        // return view('team.index')->with ('teams',$team->all());
        return view ('team.index', ['teams'=>$team->all(), 'projects'=>$project->all()]);
    }
    
    public function create()
    {
        $team = new Team;
        // $role = new Role;
        
        // $roles = $role->select('role_name')->get();
        // $teammapping = TeamMapping::where('team_name', '=', "$team_name")->get();
        // return view('teammapping.create',['teammappings'=>$teammapping, 'roles'=>$role->all()]);
        return view('team.create')->with ('teams',$team->all());
    }
    
    public function store(Request $request)
    {
        $team =new Team();
       
        //$team->user_name = $request->user_name;
        //$team->role = $request->role;
        $team->team_name = $request->team_name;

        $team->save();
        $message="successfully add!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return redirect()->route('team.index');
    }

    public function show(Team $team)
    {
        $team = new Team();
        return view('team.show')->with ('teams',$team->all());
    }

    public function edit(Team $team)
    {
        return view('team.edit')->with('teams', Team::all())->with('team', $team);
    }

    public function update(Request $request, Team $team)
    {
        //$team->user_name = $request->user_name;
        //$team->role = $request->role;
        $team->team_name = $request->team_name;
        $team->save(); 
    
        return redirect()->route('team.index', $team);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('team.index', $team);
    }
}
