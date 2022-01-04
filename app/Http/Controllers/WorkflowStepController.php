<?php

namespace App\Http\Controllers;
use App\Project;
use App\WorkflowStep;
use Illuminate\Http\Request;

class WorkflowStepController extends Controller
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
            //return view('profeature.index',['projects'=>$project, 'pros'=>$pro]);
        }
        
        $workflow = new WorkflowStep;
        return view('workflow.index',['workflows'=>$workflow->all(), 'projects'=>$project->all()]);
    }

    public function create()
    {
        $project = new Project;
        return view('workflow.create')->with('projects',$project->all());
    }

    public function store(Request $request)
    {
        $workflow = new WorkflowStep;

        $workflow->workflow_name=$request->workflow_name;
        $workflow->save();
        return redirect()->route('workflow.index');
    }

    public function show(WorkflowStep $workflowStep)
    {
        //
    }

    public function edit($wflow_id)
    {
        // $project = new Project;
        // $workflow = new WorkflowStep;
        // $workflow = WorkflowStep::find($wflow_id);
        return view('workflow.edit')->with('workflows', WorkflowStep::all())->with('workflow', $workflow);
    }

    public function update(Request $request, WorkflowStep $workflowStep)
    {
        $workflow = new WorkflowStep;
        $workflow->workflow_name=$request->workflow_name;
        $workflow->save();
        return redirect()->route('workflow.index');
    }

    public function destroy(WorkflowStep $workflowStep)
    {
        //
    }
}
