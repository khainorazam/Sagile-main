<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;
use Validator;

class APIAuthController extends BaseController
{
    // /**
    // * Register api
    // *
    // * @return \Illuminate\Http\Response
    // */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }

    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')->accessToken;
    //     $success['name'] =  $user->name;

    //     return $this->sendResponse($success, 'User register successfully.');
    // }

    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            error_log($request);

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    /**
    * Retrieve user api
    *
    * @return \Illuminate\Http\Response
    */
    public function retrieve(Request $request)
    {
        $access_token = $request->header('Authorization');
        if($access_token != ''){
            $auth_header = explode(' ', $access_token);
            $token = $auth_header[1];
            $token_parts = explode('.', $token);
            $token_header = $token_parts[1];
            $token_header_json = base64_decode($token_header);
            $token_header_array = json_decode($token_header_json, true);
            $token_id = $token_header_array['jti'];
    
            $success['user'] = Token::find($token_id)->user;
            return $this->sendResponse($success, 'User retrieved successfully.');
        }
    }
}
