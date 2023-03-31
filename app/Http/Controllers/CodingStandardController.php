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
        $user = \Auth::user();
        $user_role_name = $user->role_name;
        $project = new Project();
        $codestand = new CodingStandard();
        //return view('sprint.create',['projects'=> $project->all(), 'users'=> $user->all()]);
        return view ('codestand.index', ['codestands'=>$codestand->all(), 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
    }

    public function create()
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project();
        $codestand = new CodingStandard();
        return view('codestand.create',['codestands'=>$codestand->all(), 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
    }

    public function store(Request $request)
    {
        $codestand = new CodingStandard;
        $codestand->codestand_name=$request->codestand_name;
        $codestand->save();
        return redirect()->route('codestand.index');
    }

    public function show(CodingStandard $codestand)
    {
        $codestand = new CodingStandard();
        return view('codestand.show')->with ('codestands',$codestand->all());
    }

    public function edit(CodingStandard $codestand)
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        return view('codestand.edit')
            ->with('codestands', CodingStandard::all())
            ->with('codestand', $codestand)
            ->with('role_name', $user_role_name);
    }

    public function update(Request $request, CodingStandard $codestand)
    {
        $codestand->codestand_name = $request->codestand_name;
        $codestand->save(); 
    
        return redirect()->route('codestand.index', $codestand);
    }

    public function destroy(CodingStandard $codestand)
    {
        $codestand->delete();
        return redirect()->route('codestand.index', $codestand);
    }
}
