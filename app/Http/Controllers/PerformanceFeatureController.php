<?php

namespace App\Http\Controllers;
use App\Project;
use App\PerformanceFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class PerformanceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $project = new Project();
        $perfeature = new PerformanceFeature();
        //return view('sprint.create',['projects'=> $project->all(), 'users'=> $user->all()]);
        return view ('perfeature.index', ['perfeatures'=>$perfeature->all(), 'projects'=>$project->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $project = new Project();
        return view ('perfeature.create')->with('projects',$project->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfeature = new PerformanceFeature;

        $perfeature->perfeature_name=$request->perfeature_name;
       
        $validation = $request->validate([
            'perfeature_name' => 'required'
        ],
    
        [
            'perfeature_name.required' => '*The Performance Feature is required'
        ]);
            
       
        $perfeature->save();
        return redirect()->route('perfeature.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerformanceFeature  $performanceFeature
     * @return \Illuminate\Http\Response
     */
    public function show(PerformanceFeature $performanceFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PerformanceFeature  $performanceFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(PerformanceFeature $perfeature)
    {
        $user = \Auth::user();
        $project = new Project();

        return view('perfeature.edit',['projects'=>$project->all()])
            ->with('perfeatures', PerformanceFeature::all())
            ->with('perfeature', $perfeature);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerformanceFeature  $performanceFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceFeature $perfeature)
    {
        $perfeature->perfeature_name=$request->perfeature_name;
        $perfeature->save();
        return redirect()->route('perfeature.index', $perfeature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerformanceFeature  $performanceFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerformanceFeature $perfeature)
    {
        $perfeature->delete();
        return redirect()->route('perfeature.index', $perfeature);
    }
}
