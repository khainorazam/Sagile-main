<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Role;
use App\TeamMapping;
use App\Http\Controllers\Auth;

use Illuminate\Http\Request;


class TeamMappingController extends Controller
{
    public function index($team_name)
    {
        $user = \Auth::user();
        
        $team = new Team();
        $team = Team::where('team_name', $team_name)->first();
        $title = $team->team_name;
        $teammapping = new TeamMapping();
        $teammapping = TeamMapping::where('team_name', '=', "$team_name")->get();
        return view('teammapping.index',['teammappings'=>$teammapping])
            ->with('teams', $team)
            ->with('title', 'Team ' . $title);
        
    }
    
    public function create(Request $request)
    {
        $user = new User();
        $teammapping = new TeamMapping();
        $role = new Role();
        
        $teammapping = TeamMapping::where('team_name', '=', $request->team_name)->get();
        $user = User::whereNotIn('username', $teammapping->pluck('username'))->get();

        $role = $role->all();

        $teams = $request->teams;
        $team_name = $request->team_name;
        $title = 'Add Team Member to ' . $team_name;
        return view('teammapping.create')
            ->with('roles', $role)
            ->with('users', $user)
            ->with('team_name', $team_name)
            ->with('title', $title);

    }
    
    public function store(Request $request)
    {
        $validation = $request->validate([

            'username' => 'required',
            'role' => 'required',
        ],
        [
            'username.required' => '*The User is required',
            'role.required' => '*The Role Name is required',
        ]);

        $teammapping = new TeamMapping();
        
        //for team mapping table: save username, rolename and team name
        $teammapping->username = $request->username;
        $teammapping->role_name = $request->role;
        $teammapping->team_name = $request->team_name;
        $teammapping->save();

        $team = new Team();
        $team = Team::where('team_name', $request->team_name)->first();
        $teammapping = TeamMapping::where('team_name', '=', "$request->team_name")->get();

        return view('teammapping.index',['teammappings'=>$teammapping])
            ->with('teams', $team)
            ->with('success', 'Team member has successfully been added to team!');
;

    }

    public function show(Teammapping $teammapping)
    {
        $teammapping = new TeamMapping();
        return view('teammapping.show')->with ('teammappings',$teammapping->all());
    }

    public function edit(Teammapping $teammapping)
    {
        return view('teammappings.edit')->with('teammappings', Teammapping::all())->with('teammapping', $teammapping);
    }

    public function update(Request $request, Team $team)
    
    {
        //$team->user_name = $request->user_name;
        //$team->role = $request->role;
        $teammapping->username = $request->username;
        $teammapping->role_name = $request->role_name;
        $teammapping->save(); 
    
        return redirect()->route('teammapping.index', $teammapping);
    }

    public function destroy(Teammapping $teammapping)
    {
        $teammapping->delete();
        return redirect()->route('teammapping.index', $teammapping->team_name)
            ->with('success', 'Team member has been removed successfully');
    }

    public function search(Request $request)
    {
       // $user = new User;
        //$role = new Role;
       // $search = $request->get('search');
       // $teammapping = \App\User::query()->where('role', "%{$search}%");
         return response()->json(['success'=>'Got Simple Ajax Request.']);
       // return view('teammapping.create')->with('roles', $role->get(), 'username', $user->get()); 
    }

}
