<?php

namespace App\Http\Controllers;

use App\SecurityFeature;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class SecurityFeatureController extends Controller
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

        $secfeature = new SecurityFeature();
        return view ('secfeature.index',['secfeatures'=>$secfeature->all()])
            ->with('title', 'Security Feature')
            ->with('pros', $pro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('secfeature.create')
            ->with('title', 'Create Security Feature');
        
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
            'secfeature_name' => 'required|unique:security_features',
            'secfeature_desc' => 'required'
        ],
        [
            'secfeature_name.required' => '*The Security Feature is required',
            'secfeature_name.unique' => '*There is already an existing Security Feature with the same name',
            'secfeature_desc.required' => '*The Security Description is required'
        ]);

        //assign the request parameters
        $secfeature = new SecurityFeature();
        $secfeature->secfeature_name = $request->secfeature_name;
        $secfeature->secfeature_desc = $request->secfeature_desc;
        $secfeature->save();

        return redirect()->route('secfeature.index' ,['secfeatures'=>$secfeature->all()])
            ->with('title', 'Security Feature')
            ->with('success', 'Security Feature has successfully been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SecurityFeature  $securityFeature
     * @return \Illuminate\Http\Response
     */

    public function show(SecurityFeature $secfeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SecurityFeature  $securityFeature
     * @return \Illuminate\Http\Response
     */
    
    public function edit(SecurityFeature $secfeature)
    {
        return view('secfeature.edit')
            ->with('secfeature', $secfeature)
            ->with('title', 'Edit ' . $secfeature->secfeature_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SecurityFeature  $securityFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecurityFeature $secfeature)
    {
        //validate the request
        $validation = $request->validate([
            'secfeature_desc' => 'required'
        ],
        [
            'secfeature_desc.required' => '*The Security Description is required'
        ]);

        $secfeature->secfeature_desc = $request->secfeature_desc;
        $secfeature->save();

        $secfeatures = new SecurityFeature;

        return redirect()->route('secfeature.index' ,['secfeatures'=>$secfeatures->all()])
            ->with('title', 'Security Feature')
            ->with('success', $secfeature->secfeature_name . ' has successfully been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SecurityFeature  $securityFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecurityFeature $secfeature)
    {
        $secfeature->delete();
        
        $secfeatures = new SecurityFeature;
        return redirect()->route('secfeature.index' ,['secfeatures'=>$secfeatures->all()])
            ->with('title', 'Security Feature')
            ->with('success', 'Security Feature has successfully been deleted!');
    }
}
