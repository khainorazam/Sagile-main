<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class StatusController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        return view('status.index')->with ('statuses', $tasks->all());
    }

    public function create()
    {

        $user = \Auth::user();

        $status = new Status;
        return view('status.create')
            ->with ('statuses',$status->all());
    }

    public function store(Request $request)
    {
        $statuses = new Status();
       
        $statuses->title = $request->title;
        $statuses->slug = $request->slug;
        $statuses->order = $request->order;
        $statuses->user_id = $request->user_id;

        $statuses->save();
        $message="successfully add!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return redirect()->route('status.index');

    }

    public function show(Status $status)
    {
        // $status = new Status();
        // return view('statuses.show')->with ('statuses',$status->all());
    }

    public function edit(Status $status)
    {
        $user = \Auth::user();

        return view('status.edit')
            ->with('statuses', Status::all())
            ->with('status', $status);
    }

    public function update(Request $request, Status $statuses)
    {
        $statuses->title=$request->title;
        $statuses->slug=$request->slug;
        $statuses->order=$request->order;
        $statuses->user_id=$request->user_id;
        //$status->slug=$request->slug;
        $statuses->save(); 
    
        return redirect()->route('status.index', $statuses);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index', $status);
    }
}

        //\App\Status::where('user_id', '=', 1)->get();
        //auth()->user()->statuses()->with('tasks')->get();
        //['projects'=>$project, 'pros'=>$pro])
        //return view('tasks.index', ['tasks'=>$tasks]);
      //  return view('status.index', compact('tasks'));
       // $status = new Status;
        //$status = Status::find(auth()->user()->id);

                //$status->status_id = $request->status_id;
      
        // $this->validate($request, [
        //     'title' => ['required', 'string', 'max:56'],
        //     'slug' => ['required', 'string', 'max:56'],
        //     'order' => ['required'],
        //     'status_id' => ['required', 'exists:statuses,id']
        // ]);

        // return $request->user()
        //     ->statuses()
        //     ->create($request->only('title', 'slug', 'order', 'status_id'));