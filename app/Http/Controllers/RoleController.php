<?php

namespace App\Http\Controllers;

use App\Role;
use App\Project;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        $role = new Role;

        return view ('role.index', ['roles'=>$role->all()])
            ->with('title', 'Role')
            ->with('pros', $pro);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create')
            ->with('title', 'Create Role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the request
        $validation = $request->validate([
            'role_name' => 'required|unique:roles',
        ],
        [
            'role_name.required' => '*The Role name is required',
            'role_name.unique' => '*There is already an existing Role with the same name',
        ]);
        
        //assign the request parameters
        $role =new Role();
        $role->role_name = $request->role_name;
        $role->save();

        return redirect()->route('role.index' ,['roles'=>$role->all()])
        ->with('title', 'Role')
        ->with('success', 'Role has successfully been created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $user = \Auth::user();
        return view('role.edit')
            ->with('roles', Role::all())
            ->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->role_name=$request->role_name;
        $role->save(); 
    
        return redirect()->route('role.index', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        $roles = new Role;
        return redirect()->route('role.index' ,['roles'=>$roles->all()])
            ->with('title', 'Role')
            ->with('success', 'Role has successfully been deleted!');    
    }
}
