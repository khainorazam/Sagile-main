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
        $user = \Auth::user();
        $user_role_name = $user->role_name;
        $project = new Project();
        $role = new Role;
        // return view('role.index')->with ('roles',$role->all());
        return view ('role.index', ['roles'=>$role->all(), 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;
        $role = new Role;
        return view('role.create')
            ->with ('roles',$role->all())
            ->with('role_name', $user_role_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role =new Role();
       
        $role->role_name = $request->role_name;

        $role->save();
        $message="successfully add!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return redirect()->route('role.index');
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
        $user_role_name = $user->role_name;
        return view('role.edit')
            ->with('roles', Role::all())
            ->with('role', $role)
            ->with('role_name', $user_role_name);
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
        return redirect()->route('role.index', $role);
    }
}
