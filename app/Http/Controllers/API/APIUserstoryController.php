<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as BaseController;
use App\Http\Resources\UserstoryResource as UserstoryResource;
use Laravel\Passport\Token;
use Validator;
use Exception;
use App\User;
use App\UserStory;
use App\Task;

class APIProjectController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        try {
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendResponse([], $e->getMessage());
        }
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'title' => 'required',
                'status' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            
            return $this->sendResponse(new UserstoryResource($userstory), 'Userstory created successfully.');
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendResponse([], $e->getMessage());
        }
    } 

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        try {
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendResponse([], $e->getMessage());
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, Userstory $userstory)
    {
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'title' => 'required',
                'status' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }

            $userstory->user_story = $input['title'];
            $userstory->status_id = $input['status'];

            $userstory->save();

            // $task = Task::
            return $this->sendResponse(new UserstoryResource($userstory), 'Userstory updated successfully.');
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendResponse([], $e->getMessage());
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Userstory $userstory)
    {
        $userstory->delete();
        return $this->sendResponse([], 'User story deleted successfully.');
    }
}