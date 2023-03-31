<?php

namespace App\Http\Controllers;

use App\Task;
use App\Status;
use App\UserStory;
use App\User;
use App\Sprint;
use App\Project;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index2($u_id)
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project;
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        $userstory = new UserStory;
        $sprint = new Sprint();
        $usersprint = new userStory();
        $tasks = \App\Task::where('u_id', '=', $u_id)->get();

        return view('tasks.index2',['tasks'=>$tasks,'userstories'=>$userstory,'sprint'=>$sprint,'usersprint'=>$usersprint,'projects'=>$project->all()],compact('tasks'))
            ->with('u_id', $u_id)
            ->with('role_name', $user_role_name);
    }

    public function index()
    {
        $sprint = new Sprint();
        $sprints= $sprint->select('sprint_id')->get();

        $userstory = new UserStory();
        $userstories = $userstory->select('u_id')->get();
    //    $usersprint = new userStory();

        $tasks = auth()->user()->statuses()->with('tasks')->get();
        

    //    $userstory = \App\Task::where('sprint_id', '=', $sprint_id)->get();
    //    $tasks2 = \App\Task::where('u_id', '=', $u_id)->get();
    //\App\Status::where('user_id', '=', 1)->get();
    //auth()->user()->statuses()->with('tasks')->get();
    //['projects'=>$project, 'pros'=>$pro])
        return view('tasks.index',['sprints'=>$sprint->all(), 'userstories'=>$userstory->all()])->with(compact('tasks','sprints','userstories'));
    //    return view('tasks.index',['tasks2'=>$tasks2,'userstories'=>$userstory,'sprint'=>$sprint,'usersprint'=>$usersprint,'projects'=>$project->all()],compact('tasks'))->with('sprint_id', $sprint_id);
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

        $sprint= new Sprint;
        //$sprint = \App\Sprint::where('proj_name', '=', $proj_name)->get();
        $sprints= $sprint->select('sprint_id')->get();

        $status = new Status;
        $statuses = $status->select('id')->get();

        $project = new Project;
        $projects = $project->select('proj_name')->get();

        $userstory = new UserStory;
        //$userstory = \App\UserStory::where('sprint_id', '=', $sprint_id)->get();
        $userstories = $userstory->select('u_id')->get();

        return view('tasks.create',['statuses'=>$status->all(), 'sprints'=>$sprint->all(), 'userstories'=>$userstory->all(), 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
        //return view('tasks.create',['statuses'=>$status->all(), 'sprints'=>$sprint->all(), 'userstories'=>$userstory->all(), 'projects'=>$project->all()])->with(compact('proj_name', 'sprint_id'));
    }
    //public function create($u_id)
    //{
    //    $tasks = \App\Task::where('u_id', '=', $u_id)->get();
    //    return view('tasks.create')->with('tasks',$task->all());
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,Sprint $sprint)
    {

        $sprint = Sprint::all();
        $sprint2 = Sprint::where('sprint_id',$request->sprint_id)->first();

        $tasks = new Task();

        if($request->start_date > $sprint2->start_sprint && $request->end_date<=$sprint2->end_sprint)
        {
            //$sprint = Sprint::find($request->sprint_id);
            $tasks->title=$request->title;
            $tasks->u_id=$request->u_id;
            $tasks->id=$request->id;
            $tasks->sprint_id=$request->sprint_id;
            $tasks->user_id =\Auth::user()->id;
            $tasks->status_id = $request->status_id;
            $tasks->description=$request->description;
            $tasks->start_date=$request->start_date;
            $tasks->end_date=$request->end_date;
            $tasks->save();
        }
    else
        {
            $message="The process is unsuccessful!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        
            //$message="cannot input date";
        }

        $u_id = $request->u_id;
        $tasks = Task::where('u_id', '=', $u_id)->get();
        $project = new Project;
        return view('tasks.index2', ['projects'=>$project->all(),'task'=>$tasks, 'sprints'=>$sprint],compact('tasks'))->with('u_id', $u_id);

    /**  $this->validate($request, [
            'title' => ['required', 'string', 'max:56'],
            'description' => ['nullable', 'string'],
            'status_id' => ['required', 'exists:statuses,id']
        ]);

        return $request->user()
            ->tasks()
             ->create($request->only('title', 'description', 'status_id'));
        */
    }

   // public function store2(Request $request)
   // {
     //   $task = new Task();
    //    $task->title=$request->title;
    //    $task->description=$request->description;
    //    $task->start_date=$request->start_date;
    //    $task->end_date=$request->end_date;

   //     $validation = $request->validate([

   //         'title' => ['required','string','max:56'],
    //        'description' => ['nullable', 'string'],
    //        'status_id' => ['required', 'exists:statuses,id'],
    //        'start_date' => 'required|date|after_or_equal:today',
    //        'end_date' => 'required|date|after_or_equal:start_date'
    //    ],
    
    //    [
    //        'title.required' => '*The Task Title is required',
     //       'description.required' => '*The description is required',
     //       'start_date.required' => '*The Start Date is required',
     //       'end_date.required' => '*The Completion Date is required'


    //    ]
   
    //    );

//        $task->save();
  //      $message="The data has been successfully added!";
    //    echo "<script type='text/javascript'>alert('$message');</script>";
      //  return redirect()->route('tasks.index2');

   // }

    public function sync(Request $request)
    {
        $this->validate(request(), [
            'columns' => ['required', 'array']
        ]);

        foreach ($request->columns as $status) {
            foreach ($status['tasks'] as $i => $task) {
                $order = $i + 1;
                if ($task['status_id'] !== $status['id'] || $task['order'] !== $order) {
                    request()->user()->tasks()
                        ->find($task['id'])
                        ->update(['status_id' => $status['id'], 'order' => $order]);
                }
            }
        }

        return $request->user()->statuses()->with('tasks')->get();
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index2',$task);
    }
}
