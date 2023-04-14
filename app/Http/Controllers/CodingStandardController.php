<?php

namespace App\Http\Controllers;
use App\Project;
use App\CodingStandard;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class CodingStandardController extends Controller
{
    public function index()
    {   
        //Get the project where user's team name(s) is the same with project's team name
        $user = \Auth::user();
        $teammapping = \App\TeamMapping::where('username', '=', $user->username)->pluck('team_name')->toArray(); // use pluck() to retrieve an array of team names
        $pro = \App\Project::whereIn('team_name', $teammapping)->get(); // use whereIn() to retrieve the projects that have a team_name value in the array

        $codestand = new CodingStandard();
        return view ('codestand.index', ['codestands'=>$codestand->all()])
            ->with('title', 'Coding Standard')
            ->with('pros', $pro);
    }

    public function create()
    {
        return view('codestand.create')
            ->with('title', 'Create Coding Standard');
    }

    public function store(Request $request)
    {   
        //validate the request
        $validation = $request->validate([
            'codestand_name' => 'required|unique:coding_standards',
        ],[
            'codestand_name.required' => '*The Coding Standard Name is required',
            'codestand_name.unique' => '*There is already an existing Coding Standard with the same name',
        ]);

        //assign the request parameters to new Coding Standard
        $codestand = new CodingStandard;
        $codestand->codestand_name = $request->codestand_name;
        $codestand->save();

        $codestands = new CodingStandard;

        return redirect()->route('codestand.index', ['codestands'=>$codestands->all()])
        ->with('title', 'Coding Standard')
        ->with('success', 'Coding Standard has successfully been created!');
    }

    public function show(CodingStandard $codestand)
    {
        $codestand = new CodingStandard();
        return view('codestand.show')->with ('codestands',$codestand->all());
    }

    public function edit(CodingStandard $codestand)
    {
        return view('codestand.edit')
            ->with('title', 'Edit ' . $codestand->codestand_name)
            ->with('codestand', $codestand);
    }

    public function update(Request $request, CodingStandard $codestand)
    {
        //validate the request
        $validation = $request->validate([
            'codestand_name' => 'required',
        ],[
            'codestand_name.required' => '*The Coding Standard Name is required',
        ]);

        $codestand->codestand_name = $request->codestand_name;
        $codestand->save(); 
    
        $codestands = new CodingStandard;

        return redirect()->route('codestand.index', ['codestands'=>$codestands->all()])
        ->with('title', 'Coding Standard')
        ->with('success', 'Coding Standard has successfully been updated!');    
    }

    public function destroy(CodingStandard $codestand)
    {
        $codestand->delete();
        
        $codestands = new CodingStandard;

        return redirect()->route('codestand.index', ['codestands'=>$codestands->all()])
        ->with('title', 'Coding Standard')
        ->with('success', 'Coding Standard has successfully been deleted!');    
    }
}
