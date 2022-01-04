<?php

namespace App\Http\Controllers;
use App\Mapping;
use App\Project;
use App\Status;
use App\SecurityFeature;
use App\PerformanceFeature;
use App\UserStory;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    public function store()
    {
        //
    }
    
    public function destroy(Mapping $map, UserStory $userstory)
    {
        $map->delete();
        $project = new Project;
        
        $secfeature = new SecurityFeature;
        $perfeature = new PerformanceFeature;
        // $status = new Status;
        $map = new Mapping;
        
        $secfeatures = $secfeature->select('secfeature_name')->get();
        $perfeatures = $perfeature->select('perfeature_name')->get();
        // $statuses = $status->select('status_title')->get();
        return view('userstory.edit',['maps'=>$map->all(),'secfeatures'=>$secfeature->all(), 'perfeatures'=>$perfeature->all(),'userstory'=>$userstory, 'projects'=>$project->all()]);
    }
}
