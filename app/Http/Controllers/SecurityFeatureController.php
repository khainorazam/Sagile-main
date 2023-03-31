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
        $user = \Auth::user();
        $user_role_name = $user->role_name;
        $project = new Project;
        // if (\Auth::check())
        // {
        //     $id = \Auth::user()->getId();
            
        // }
        // if($id)
        // {
        //     $pro = \App\Project::where('id', '=', $id)->get();
        //    //return view('profeature.index',['projects'=>$project, 'pros'=>$pro]);
        // }
        
        $secfeature = new SecurityFeature();
        return view ('secfeature.index',['secfeatures'=>$secfeature->all(), 'projects'=>$project->all()])->with('role_name', $user_role_name);
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
        return view ('secfeature.create')
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
        $project = new Project;

        $secfeature = new SecurityFeature();
        $secfeature->secfeature_name=$request->secfeature_name;
        $secfeature->secfeature_desc=$request->secfeature_desc;
        
        $validation = $request->validate([

            'secfeature_name' => 'required',
            'secfeature_desc' => 'required'
        ],
    
        [
            'secfeature_name.required' => '*The Security Feature is required',
            'secfeature_desc.required' => '*Please fill the Security Description'
        ]);
        
        $secfeature->save();
        return redirect()->route('secfeature.index' ,['secfeatures'=>$secfeature->all(), 'projects'=>$project->all()]);
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
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project;

        return view('secfeature.edit',['projects'=>$project->all()])
            ->with('secfeatures', SecurityFeature::all())
            ->with('secfeature', $secfeature)
            ->with('role_name', $user_role_name);

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
        $secfeature->secfeature_name=$request->secfeature_name;
        $secfeature->secfeature_desc=$request->secfeature_desc;
        $secfeature->save();
        return redirect()->route('secfeature.index');
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
        return redirect()->route('secfeature.index', $secfeature);
    }
}
