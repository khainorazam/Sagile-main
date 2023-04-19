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
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        $perfeature = new PerformanceFeature();
        return view ('perfeature.index', ['perfeatures'=>$perfeature->all()])
            ->with('title', 'Performance Feature')
            ->with('pros', $pro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('perfeature.create')
            ->with('title', 'Create Performance Feature');
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
            'perfeature_name' => 'required|unique:performance_features'
        ],[
            'perfeature_name.required' => '*The Performance Feature is required',
            'perfeature_name.unique' => '*There is an existing Performance Feature with the same name',
        ]);

        $perfeature = new PerformanceFeature;
        $perfeature->perfeature_name = $request->perfeature_name;
        $perfeature->save();

        return redirect()->route('perfeature.index' ,['perfeatures'=>$perfeature->all()])
            ->with('title', 'Performance Feature')
            ->with('success', 'Performance Feature has successfully been created!');

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

        return redirect()->route('perfeature.index' ,['perfeatures'=>$perfeature->all()])
            ->with('title', 'Performance Feature')
            ->with('success', 'Performance Feature has successfully been deleted!');
    }
}
