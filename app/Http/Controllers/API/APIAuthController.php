<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class APIAuthController extends BaseController
{
    // public function login()
    // {
        // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        //     $user = Auth::user();
        //     $success['token'] = $user->createToken('appToken')->accessToken;
        //     //After successful authentication, notice how I return json parameters
        //     return response()->json([
        //         'success' => true,
        //         'token' => $success,
        //         'user' => $user
        //     ]);
        // } else{
        //     //if authentication is unsuccessful, notice how I return json parameters
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Invalid email or password.',
        //     ],401);
        // }
    // }

    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
