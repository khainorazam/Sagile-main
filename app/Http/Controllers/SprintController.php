<?php

namespace App\Http\Controllers;
use App\Sprint;
use App\Project;
use App\User;
use App\ProductFeature;
use App\Http\Controllers\Auth;
use DB;

use Illuminate\Http\Request;

class SprintController extends Controller
{
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
            return view('profeature.index',['projects'=>$project, 'pros'=>$pro]);
        }
        
        $sprint = new Sprint;
        return view ('sprint.index', ['sprints'=>$sprint->all(), 'projects'=>$project->all()]);
    }

    public function create()
    {
        $user = \Auth::user();

        $project = new Project;
        $projects = $project->select('proj_name')->get();
        
        $user = new User;
        $users = $user->select('name')->get();

        return view('sprint.create', ['users'=>$user->all(), 'projects'=>$project->all()]);
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();
        return redirect()->route('sprints.index');
    }
 
    /*public function search(Request $request)
    {
        $project = new Project;
        $search = $request->get('search');
        $sprint = \App\Sprint::query()->where('proj_name', 'LIKE', "%{$search}%")->get();
        return view('sprint.index',['sprints'=>$sprint, 'projects'=>$project->all()]);
   
    }*/
    
    public function store(Request $request,Project $project)
    {
        $project = Project::all();
        $project2 = Project::where('proj_name',$request->proj_name)->first();
     
        $sprint =new Sprint();
      
    if($request->start_sprint > $project2->start_date && $request->end_sprint<=$project2->end_date)
        {
            //$sprint = Sprint::find($request->sprint_id);
            $sprint->sprint_name=$request->sprint_name;
            $sprint->proj_name=$request->proj_name;
            $sprint->users_name=$request->users_name;
            $sprint->sprint_desc=$request->sprint_desc;
            $sprint->start_sprint=$request->start_sprint;
            $sprint->end_sprint=$request->end_sprint;
            $sprint->save();
        }
    else
        {
                print "<h2>cannot input date!</h2>";
        
            //$message="cannot input date";
        }
        
        $proj_name = $request->proj_name;
        // $status_title = $request->status_title;
        // $sprint = Sprint::where('proj_name', '=', "$proj_name", 'status_title', '=', "$status_title")->get();
        $sprint = Sprint::where('proj_name', '=', $proj_name)->get();
        // $sprint = Sprint::where('status_title', '=', "$status_title")->get();
        return view('profeature.index2', ['sprints'=>$sprint, 'projects'=>$project]);
        
        //return redirect()->route('sprints.index');
    }

    public function edit(Sprint $sprint, $id)
    {
        $user = \Auth::user();

        $project = new Project;
        $sprint = new Sprint;
        $sprint = Sprint::find($id);
       // return view('project.edit')->with('projects', $project->all());
        return view('sprint.edit',['sprint'=>$sprint, 'projects'=>$project->all()]);
    }

    public function update2(Request $request){
        DB::table('sprint')->where('sprint_id', $request->sprint_id)->update([
            'proj_name'=> $request->proj_name,
            'sprint_name'=>$request->sprint_name,
            'sprint_desc'=>$request->sprint_desc,
            'users_name'=>$request->users_name,
            'start_sprint'=>$request->start_sprint,
            'end_sprint'=>$request->end_sprint

        ]);
        return back()->with('message', 'Sprint Updated!');
        
    }

    public function update( Request $request, Sprint $sprint, $proj_name = [])
    {
        $project = Project::all();
        // $sprint = Sprint::find($request->sprint_id);
        $sprint->sprint_id=$request->sprint_id;
        $sprint->proj_name=$request->proj_name;
        $sprint->sprint_name=$request->sprint_name; 
        $sprint->sprint_desc=$request->sprint_desc;
        $sprint->users_name=$request->users_name;
        $sprint->start_sprint=$request->start_sprint;
        $sprint->end_sprint=$request->end_sprint; 
    
    $validation = $request->validate([

        'proj_name' => 'required',
        'sprint_name' => 'required',
        'sprint_desc' => 'required',
        'user_name' => 'required',
        'start_sprint' => 'required|date|after_or_equal:today',
        'end_sprint' => 'required|date|after_or_equal:start_date',
    ],

    [
        'proj_name' => 'Choose the Project Name',
        'sprint_name' => 'Please fill the Sprint Name',
        'sprint_desc' => 'Please fill the Sprint Description',
        'user_name' => 'Choose the User',
        'start_sprint' => 'Please enter the date',
        'end_sprint' => 'Please enter the date',
    ]);

        error_log($sprint);
        $sprint->save();
        $proj_name = $request->proj_name;
        $sprint = Sprint::where('proj_name', '=', $proj_name)->get();
        return redirect()->route('profeature.index2', ['sprints'=>$sprint, 'projects'=>$project]);
        // return view('profeature.index2', ['sprints'=>$sprint, 'projects'=>$project]);

               // $sprint = Sprint::where('status_title', '=', "$status_title")->get();
          // $status_title = $request->status_title;
        // $sprint = Sprint::where('proj_name', '=', "$proj_name", 'status_title', '=', "$status_title")->get();
    }

}

 //$project3 = Project::where('proj_name','=', $request->proj_name)->get((['end_date']));
        //$projectStartDate = $project->start_date;
        //$projectEndDate = $project->end_date;
        //$start_date = Project::where('start_date','=', 'start_date')->first();
        //$end_date = Project::where('end_date','=', 'end_date')->first();

        //$input = $request->all();
    	//$data = [];
    	//$data['sprint_name'] = json_encode($input['sprint_name']);

    	//Sprint::create($data);
        //return response()->json(['success'=>'Success Fully Insert Recoreds']);
       
        