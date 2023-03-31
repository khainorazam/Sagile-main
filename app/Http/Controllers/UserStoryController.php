<?php

namespace App\Http\Controllers;
use App\Priority;
use App\UserStory;
// use App\WorkflowStep;
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

    // public function call()
    // {
    //     $secfeature = new SecurityFeature;
    //     $perfeature = new PerformanceFeature;

    //     $secfeature = \App\SecurityFeature::where('secfeature_name', '=', $SecFeature_id)->get();
    //     $perfeature = \App\PerformanceFeature::where('perfeature_name', '=', $perfeature_id)->get();

    //     // return [$secFeature, $perfeature];
    //     return redirect()->action([UserStoryController::userstory, 'index'], ['secfeature']->$secfeature, ['perfeature']->$perfeature);
    // }

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
    
    public function create(Userstory $sprint_id)
    {

        $user = \Auth::user();
        $user_role_name = $user->role_name;

        Route::currentRouteName();
        $sprint = Sprint::all();
        //$userstory = UserStory::find($request->sprint_id);        
        // $workflow = new WorkflowStep;
        $status = new Status;
        $prio = new Priority;
        $project = new Project;
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $prios = $prio->select('prio_name')->get();
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();
        
        //$sprint_id = $request->sprint_id;
        $sprint = Sprint::where('sprint_id', '=', "$sprint_id")->get();
        return view('userstory.create',compact('sprint_id'),['proj_name','perfeatures'=> $perfeature->all(),'prios'=> $prio->all(), 'secfeatures'=> $secfeature->all(), 'projects'=>$project->all(),'statuses'=>$status->all(), 'sprint'=>$sprint_id])
            ->with('role_name', $user_role_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::all();
        $userstory = new UserStory();
        $secfeature = new SecurityFeature();
        $perfeature = new PerformanceFeature();

        $userstory->user_story = $request->user_story;
        $userstory->desc_story = $request->desc_story;
        $userstory->due_day = $request->due_day;
        $userstory->prio_story = $request->prio_story;
        $userstory->title = $request->title;
        
        // $userstory->perfeature_id = implode($$request->perfeature_id, ',');
        // $userstory->SecFeature_id = implode($$request->SecFeature_id, ',');
        $str_perfeatures = json_encode($request->perfeature_id);
        $str_secfeatures = json_encode($request->SecFeature_id);
        $userstory->perfeature_id = $str_perfeatures;
        $userstory->SecFeature_id = $str_secfeatures;


        $sprint= new Sprint();
        /*$sprint = Sprint::where('sprint_id', '=', $sprint_id)
        ->select('sprint_id')->first();*/
        $userstory->sprint_id = $request->sprint_id;
        $userstory->save();
  
        $sprint_id = $request->sprint_id;
        $userstory = UserStory::where('sprint_id', '=', "$sprint_id")->get();
        return view('profeature.index3',['userstories'=>$userstory, 'projects'=>$project, 'perfeatures'=>$perfeature, 'secfeatures'=>$secfeature]);
           
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
        //$project = new Project;
        //return view('userstory.edit',['userstory'=>$userStory,'projects'=>$project->all()]);
        $user = \Auth::user();
        $user_role_name = $user->role_name;
        
        $project = new Project;
        // $workflow = new WorkflowStep;
        $status = new Status;
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $map = new Mapping;
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();

        // $str_perfeatures = json_decode(select('secfeature_id')->get());
        // $str_secfeatures = json_decode(select('perfeature_id')->get());

        // $request->perfeature_id = json_decode($str_perfeatures);
        // $request->SecFeature_id = json_decode($str_secfeatures);
        // $userstory->perfeature_id = $str_perfeatures;
        // $userstory->SecFeature_id = $str_secfeatures;

        $status = $status->select('title')->get();
       
        return view('userstory.edit',['secfeatures'=>$secfeature->all(), 'perfeatures'=>$perfeature->all(),'statuses'=>$status->all(),'userstory'=>$userstory, 'projects'=>$project->all()])
            ->with('role_name', $user_role_name);
        // 'maps'=>$map->all(),
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
        $project = new Project;
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        $userstory->user_story=$request->user_story;
        $userstory->desc_story=$request->desc_story;
        $userstory->due_day=$request->due_day;
        $userstory->prio_story=$request->prio_story;
        $userstory->title=$request->title;

        // $str_perfeatures = json_encode($request->perfeature_id);
        // $str_secfeatures = json_encode($request->SecFeature_id);
        // $userstory->perfeature_id = $str_perfeatures;
        // $userstory->SecFeature_id = $str_secfeatures;
        $userstory->save();
        
       return redirect()->route('profeature.index3',['userstories'=>$userstory,'projects'=>$project, 'perfeatures'=>$perfeature, 'secfeatures'=>$secfeature]);
    //    'mappings'=>$mapping, 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStory $userstory)
    {
        $project = Project::all();
        $userstory->delete();
        return redirect()->route('profeature.index3', $userstory);
    }
}

// $mapping = new Mapping();
        // $secfeatures = new SecurityFeature;
        // // $mapping = UserStory::where('u_id', '=', 'u_id')->get();

        // $checked_arr = $_POST['secfeature_id'];
        // $count = count($checked_arr);
        // echo "There are ".$count." checkboxe(s) are checked";

        // // for(int secfeature_id = 0; secfeature_id<count; i++)
        // {
        //     $mapping = new Mapping();
        //     // $mapping->ustory_id = \App\Mapping::where('ustory_id', '=', $u_id)->get();
        //     $mapping->ustory_id=$request->u_id;
        //     $mapping->type_NFR= 1;
        //     $mapping->id_NFR=$secfeatures; 
        //     $mapping->save();
        // }
        // // @endfor

        // $checked_arr = $_POST['perfeature_id'];
        // $count = count($checked_arr);
        // echo "There are ".$count." checkboxe(s) are checked";

        // // for()
        // {
        //     $mapping2 = new Mapping();
        //     $mapping2->ustory_id=$request->u_id;
        //     $mapping2->type_NFR= 2;
        //     $mapping2->id_NFR=$perfeatures; 
        //     $mapping2->save();
        // }

        // $userstory = UserStory::whereIn('u_id', function($query){
        //     $query->select('u_id')->where('datetime', DB::raw("(select max('datetime') from table)"));
        //     })->orderBy('u_id', 'desc')->first();

// $mappings = new Mapping();
        
        // $secfeatures = $request->SecFeature_id;
           
        //         foreach($mappings as $mapping)
        //         {
        //             $mapping = new Mapping();
        //             $mapping->ustory_id=$request->u_id;
        //             $mapping->type_NFR= 1;
        //             $mapping->id_NFR=$secfeature_id; 
        //             $mapping->save();
        //         }

        // $perfeatures = $request->perfeature_id;    
                
        //         foreach($mappings as $mapping2)
        //         {
        //             $mapping2 = new Mapping();
        //             $mapping2->ustory_id=$request->u_id;
        //             $mapping2->type_NFR= 2;
        //             $mapping2->id_NFR=$perfeature_id; 
        //             $mapping2->save();
        //         }

        // $mapping = new Mapping();
        // $secfeatures = new SecurityFeature;
        // $perfeatures = new PerformanceFeature;
        // // $mapping = UserStory::where('u_id', '=', 'u_id')->get();

        // $checked_arr = $_POST['secfeature_id'];
        // $count = count($checked_arr);
        // echo "There are ".$count." checkboxe(s) are checked";

        // // for(int secfeature_id = 0; secfeature_id<count; i++)
        // {
        //     $mapping = new Mapping();
        //     // $mapping->ustory_id = \App\Mapping::where('ustory_id', '=', $u_id)->get();
        //     $mapping->ustory_id=$request->u_id;
        //     $mapping->type_NFR= 1;
        //     $mapping->id_NFR=1; 
        //     $mapping->save();
        // }
        // // @endfor

        // $checked_arr = $_POST['perfeature_id'];
        // $count = count($checked_arr);
        // echo "There are ".$count." checkboxe(s) are checked";

        // // for()
        // {
        //     $mapping2 = new Mapping();
        //     $mapping2->ustory_id=$request->u_id;
        //     $mapping2->type_NFR= 2;
        //     $mapping2->id_NFR=2; 
        //     $mapping2->save();
        // }

        // $userstory = UserStory::whereIn('u_id', function($query){
        //     $query->select('u_id')->where('datetime', DB::raw("(select max('datetime') from table)"));
        //     })->orderBy('u_id', 'desc')->first();
       