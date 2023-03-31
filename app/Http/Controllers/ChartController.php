<?php

namespace App\Http\Controllers;
use App\Priority;
use App\Role;
use App\User;
use App\UserStory;
use App\Project;
use App\Sprint;
use App\Http\Controllers\Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sprint_id)
    {
        $user = \Auth::user();
        $user_role_name = $user->role_name;

        $project = new Project;
        //$userstory = new UserStory;
        $sprint = new Sprint();
        $usersprint = new userStory();
        
        // $data = DB::table('projects')
        //         ->select(
        //             DB::raw('start_date as start_date'),
        //             DB::raw('count(*) as number')
        //         )
        //         ->groupBy('start_date')
        //         ->get();
        
        //         $array[] = ['Start', 'Number'];
        //         foreach($data as $key => $value)
        //         {
        //             $array[++$key] = [$value->start_date, $value->number];
        //         }
        $userstory = \App\UserStory::where('sprint_id', '=', $sprint_id)->get();
        //return view('chart.index',['userstories'=>$userstory->all(),'sprint'=>$sprint,'usersprint'=>$usersprint,'projects'=>$project->all()]);
        return view('chart.index',['userstories'=>$userstory,'sprint'=>$sprint,'usersprint'=>$usersprint,'projects'=>$project->all()])
            ->with('role_name', $user_role_name)
            ->with('sprint_id', $sprint_id);
        // ->with('start_date', json_encode($array))
    }
   
}

// function index()
//     {
//      $data = DB::table('tbl_employee')
//        ->select(
//         DB::raw('gender as gender'),
//         DB::raw('count(*) as number'))
//        ->groupBy('gender')
//        ->get();
//      $array[] = ['Gender', 'Number'];
//      foreach($data as $key => $value)
//      {
//       $array[++$key] = [$value->gender, $value->number];
//      }
//      return view('google_pie_chart')->with('gender', json_encode($array));
//     }
