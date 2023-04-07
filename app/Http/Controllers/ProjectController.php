<?php

namespace App\Http\Controllers;
use App\Project;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //not real index
    public function index()
    {
        $project = new Project;
        if (\Auth::check())
        {
            $id = \Auth::user()->getId();
            
        }
        if($id)
        {
            $pro = \App\Project::where('user_id', '=', $id)->get();
            // $pro = \App\Project::where('id', '=', $id)->get();
            return view('profeature.index',['projects'=>$project->all(), 'pros'=>$pro->all()]);
        }
      
        return view('project.index')->with ('projects',$project->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $project = new Project;
        // $pro = new Project;
        return view('project.create')
            ->with ('projects',$project->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $project =new Project();
        $project->user_id = \Auth::user()->id;
        $project->proj_name=$request->proj_name;
        $project->proj_desc=$request->proj_desc;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date; 
        //it will store the current logged in user id in user_id field
        
        $validation = $request->validate([

            'proj_name' => 'required',
            'proj_desc' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date'
        ],
    
        [
            'proj_name.required' => '*The Project Title is required',
            'proj_desc.required' => '*The Description is required',
            'start_date.required' => '*The Start Date is required',
            'end_date.required' => '*The Completion Date is required'


        ]
   
        );

        $project->save();
        $message="successfully add!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return redirect()->route('profeature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = new Project();
        return view('profeature.index')->with ('projects',$project->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $user = \Auth::user();
        $pro = \App\Project::where('team_name', '=', $user->team_name)->get();

        return view('project.edit')
        ->with('projects', $pro)
        ->with('project', $project);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $project)
    {
        $project->proj_name=$request->proj_name;
        $project->proj_desc=$request->proj_desc;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date; 
        $project->save(); 
    
        return redirect()->route('profeature.index', $project);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('profeature.index', $project);
    }
}
