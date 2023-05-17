<?php

namespace App\Http\Controllers;
use App\Project;
use App\DefectFeature;
use App\UserStory;
use Illuminate\Http\Request;

class DefectFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = new Project;
        $ustory = new UserStory;
        $deffeature = new DefectFeature;
        return view('deffeature.index',['projects'=>$project->all(), 'userstory'=>$ustory->all(), 'deffeatures'=>$deffeature->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        $project = new Project;
        $ustory = new UserStory;
        //return view('deffeature.add',['projects'=>$project->all(), 'userstory'=>$ustory->all()]);
    }
    

    public function create()
    {
        $deffeature = new DefectFeature;
        return view('deffeature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deffeature = new DefectFeature();

        // $deffeature->user_story=$request->user_story;
        // $deffeature->means=$request->means;
        // $deffeature->prio_story=$request->prio_story;
        // $deffeature->status_title=$request->status_title;
        // $deffeature->defect=$request->defect;

        $deffeature->title=$request->title;
        $deffeature->desc=$request->desc;

        $deffeature->save();
        return redirect()->route('deffeature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DefectFeature  $defectFeature
     * @return \Illuminate\Http\Response
     */
    public function show(DefectFeature $defectfeature)
    {
        $deffeature = new DefectFeature();
        return view('deffeature.show')->with ('deffeatures',$deffeature->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DefectFeature  $defectFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectFeature $defectfeature)
    {
        $deffeature = new DefectFeature;
        return view('deffeature.edit')->with('diffeatures', DefectFeature::all())->with('deffeature', $deffeature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DefectFeature  $defectFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefectFeature $defectFeature)
    {
        $deffeature->title = $request->title;
        $deffeature->desc = $request->desc;
        $deffeature->save(); 
    
        return redirect()->route('deffeature.index', $deffeature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DefectFeature  $defectFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectFeature $defectfeature)
    {
        $deffeature->delete();
        return redirect()->route('deffeature.index', $deffeature);
    }
}
