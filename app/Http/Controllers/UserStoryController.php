<?php

namespace App\Http\Controllers;
use App\Priority;
use App\UserStory;
use App\Status;
use App\SecurityFeature;
use App\PerformanceFeature;
use App\Project;
use App\Mapping;
use App\Sprint;
use App\Http\Controllers\Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $
        $userstory = new UserStory;
        // $userstory->$userstory.secfeature;
        // $userstory->$userstory.perfeature;
        // public function index(perfeature, secfeature)
        return view('userstory.index',['userstories'=>$userstory->all(),'projects'=>$project->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getID()
    {
        $parameters = \Request::segment(3);
        return $parameters;
    }

    public static function getID2()
    {
        $parameters = \Request::segment(2);
        return $parameters;
    }
    
    public function create($sprint_id)
    {
        $user = \Auth::user();

        //Currently gets status related to user (might change in future)
        $status = Status::where('user_id', $user->id)->get();
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();
        
        //get related sprint with the user story
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();
        
        return view('userstory.create',['perfeatures'=> $perfeature->all(), 'secfeatures'=> $secfeature->all()])
            ->with('title', 'Create User Story for '. $sprint->sprint_name)
            ->with('sprint_id', $sprint_id)
            ->with('statuses', $status);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get the current sprint involved
        $sprint = Sprint::where('sprint_id', $request->sprint_id)->first();

        //Validate the request parameters
        $validation = $request->validate([
            'user_story' => 'required|unique:user_stories,user_story,NULL,id,sprint_id,'.$request->input('sprint_id'), 
            'desc_story' => 'required',
            'title' => 'required',
        ], [
            'user_story.required' => '*The User Story Name is required',
            'user_story.unique' => '*There is already an existing User Story in the sprint with the same name',
            'desc_story.required' => '*The Description is required',
            'title.required' => '*The Status is required',
        ]);

        //Assign request values to new Userstory 
        $userstory = new UserStory;
        $userstory->user_story = $request->user_story;
        $userstory->desc_story = $request->desc_story;
        $userstory->title = $request->title;

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        
        $userstory->sprint_id = $request->sprint_id;
        $userstory->save();

        //redirect to index3 page
        $sprint_id = $request->sprint_id;
        $userstory = UserStory::where('sprint_id', $sprint_id)->get();

        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstory)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story has successfully been created!');
            
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
    */
        
    public function show(UserStory $userStory)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */

    public function edit(UserStory $userstory, $id =[])
    { 
        $user = \Auth::user();
        
        $status = Status::where('user_id', $user->id)->get();
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();

        $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->first();

        return view('userstory.edit',['secfeatures'=>$secfeature->all(), 'perfeatures'=>$perfeature->all()])
            ->with('title', 'Edit ' . $userstory->user_story . ' in '. $sprint->sprint_name)    
            ->with('userstory', $userstory)
            ->with('statuses', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, UserStory $userstory)
    {
        //Validate the request parameters
        $validation = $request->validate([
            'desc_story' => 'required',
            'title' => 'required',
        ], [
            'desc_story.required' => '*The Description is required',
            'title.required' => '*The Status is required',
        ]);

        //Assign request values to current Userstory 
        //user_story name and sprint ID not included because does not change
        $userstory->desc_story = $request->desc_story;
        $userstory->title = $request->title;

        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->secfeature_id);

        $userstory->perfeature_id = $str_perfeatures;
        $userstory->secfeature_id = $str_secfeatures;
        
        $userstory->save();

        //redirect to index3 page
        $sprint = Sprint::where('sprint_id', $userstory->sprint_id)->first();
        $sprint_id = $sprint->sprint_id;
        $userstories = UserStory::where('sprint_id', $sprint_id)->get();

        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstories)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', $userstory->user_story . ' has successfully been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStory $userstory)
    {
        $sprint_id = $userstory->sprint_id;
        $userstories = UserStory::where('sprint_id', $sprint_id)->get();
        $sprint = Sprint::where('sprint_id', $sprint_id)->first();

        $userstory->delete();

        return redirect()->route('profeature.index3', ['sprint_id' => $sprint_id])
            ->with('userstories', $userstories)
            ->with('title', 'User Story for ' . $sprint->sprint_name)
            ->with('success', 'User Story has successfully been deleted!');
    }
}

       