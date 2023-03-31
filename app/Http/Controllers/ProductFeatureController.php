<?php
//Controller for Project List, Sprint

namespace App\Http\Controllers;
use App\Project;
use App\Sprint;
use App\User;
use App\UserStory;
use App\ProductFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Projects List Page
    public function index(User $id, Project $project)
    {

        $project = new Project();
        if (\Auth::check())
        {
            $id = \Auth::user()->getId();
            
        }
        if($id)
        {   
            $user = \Auth::user();
            $user_role_name = $user->role_name;
            $pro = \App\Project::where('user_id', '=', $id)->get();     
            return view('profeature.index',['projects'=>$project->all(), 'pros'=>$pro->all()])
                ->with('role_name', $user_role_name);

            // $project =\App\Project::where('proj_name', '=', "$proj_name")->get();
            // return view('profeature.index',['projects'=>$project]);
        }
        return view('project.index',['projects'=>$project->all(), 'pros'=>$pro->all()]);
            
    }

    //Main Sprint Page 
    public function index2($proj_name)
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project();
        $sprint = Sprint::where('proj_name', '=', "$proj_name")->get();
        return view('profeature.index2',['sprints'=>$sprint, 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
    }

    //Main UserStory Page 
    public function index3($sprint_id)
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project();
        $create = new UserStory();
        $sprint = new Sprint();
        $usersprint = new userStory();
        
        $userstory = \App\UserStory::where('sprint_id', '=', $sprint_id)->get();
        //dd($userstory);
        return view('profeature.index3',['create'=>$create, 'sprint'=>$sprint, 'usersprint'=>$usersprint,'userstories'=>$userstory, 'projects'=>$project->all()])
            ->with('role_name', $user_role_name)
            ->with('sprint_id', $sprint_id);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    public function edit2()
    {
        $project = new Project;
        $status = new Status;
        return view('userstory.edit',['statuses'=>$status->all(),'userstory'=>$userStory, 'projects'=>$project->all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFeature $productFeature)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFeature $productFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */

}
