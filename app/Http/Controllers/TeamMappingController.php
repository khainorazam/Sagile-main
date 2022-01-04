<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Role;
use App\TeamMapping;

use Illuminate\Http\Request;


class TeamMappingController extends Controller
{
    public function index($team_name)
    {
        $team = new Team();
        $teammapping = new TeamMapping();
        $teammapping = TeamMapping::where('team_name', '=', "$team_name")->get();
        return view('teammapping.index',['teammappings'=>$teammapping, 'teams'=>$team->all()]);
        
        //return view('teammapping.index')->with ('teammappings', $teammapping->all(), 'teams',$team->all());
    }
    
    public function create($team_name)
    {
        $teammapping = new TeamMapping;
      
        // $user = new User;
        //$teammapping->team_name = $request->team;
        //$teams = Team::where('team_name', $request->team)->get();
        // return view('teammapping.create')->with('roles', $role->all(), 'teams', $teammapping);
        // return view('role.index')->with ('roles',$role->all());

        $role = new Role;
        $team = new Team;
        
        $roles = $role->select('role_name')->get();
        $teammapping = TeamMapping::where('team_name', '=', "$team_name")->get();
        return view('teammapping.create',['teammappings'=>$teammapping, 'roles'=>$role->all()]);
    }
    
    public function store(Request $request)
    {
        //$role = new Role;
        //$user = new User;
        //$team = Role::all();
        //$team = Role::where('role_name',$request->role_name)->first();
        $teammapping = new TeamMapping;
        
        $teammapping->username = $request->user;
        $teammapping->role_name = $request->role;
        $teammapping->team_name = $request->team_name;
        // $teammapping = TeamMapping::where('team_name', '=', "$team_name")->get();
        //$teammapping->team_name = $request->team;
        $teammapping->save();
         $team = new Team();
        $teammapping = new TeamMapping();
        $teammapping = TeamMapping::where('team_name', '=', "$request->team_name")->get();
        return view('teammapping.index',['teammappings'=>$teammapping, 'teams'=>$team->all()]);
        // return view('teammapping.index', ['roles'=>$role->all(), 'users'=>$user->all(), 'teams'=>$team->all(), 'teammappings'=>$teammapping->all()]);
        // return view('teammapping.index')->with('teammappings',$teammapping->all());
        //$team->user_name = $request->user_name;
        //$team->role = $request->role;
        //$role->role_name = $request->role_name;
        //$user->username = $request->username;
        // echo $request;
        //$role = Role::all();
        //$role_name = Role::where('role_name',$request->role_name)->first();

        //$role_name = $request->role_name;
        //$user = User::where('role_name', '=', "$role_name")->get();
        

        //$role_name =$request->input('role');
        //$users = User::where('role_name',$role_name)->get();

        //$teammapping->save();

        //$role_name = $request->role_name;
        //$role = Role::where('role_name', '=', "$role_name")->get();
        //return view('teammapping.index')->with('role_name', $role_name, 'username', $user);
    }

    public function show(Teammapping $teammapping)
    {
        $teammapping = new TeamMapping();
        return view('teammapping.show')->with ('teammappings',$teammapping->all());
    }

    public function edit(Teammapping $teammapping)
    {
        return view('teammappings.edit')->with('teammappings', Teammapping::all())->with('teammapping', $teammapping);
    }

    public function update(Request $request, Team $team)
    
    {
        //$team->user_name = $request->user_name;
        //$team->role = $request->role;
        $teammapping->username = $request->username;
        $teammapping->role_name = $request->role_name;
        $teammapping->save(); 
    
        return redirect()->route('teammapping.index', $teammapping);
    }

    public function destroy(Teammapping $teammapping)
    {
        $teammapping->delete();
        return redirect()->route('teammapping.index', $teammapping);
    }

    public function search(Request $request)
    {
       // $user = new User;
        //$role = new Role;
       // $search = $request->get('search');
       // $teammapping = \App\User::query()->where('role', "%{$search}%");
         return response()->json(['success'=>'Got Simple Ajax Request.']);
       // return view('teammapping.create')->with('roles', $role->get(), 'username', $user->get()); 
    }

    public function getUsers(request $request)
    {
        $team = new Team;
        //$user = new User;
        //return view('user.index')->with ('users',$user->all());
        //$roles = $role->select('role_name')->get();
        //"%{$roles}%"
        //$results = Role::with('role_name')->get();

        if($request->ajax())
        {
            //$select = $request->all();
            //\Log::info($select);

            //return response()->json(['success'=>'Got Simple Ajax Request.']);
            //  $role_name = 'Programmer'; 
            // $users = User::get();
            
            $role_name =$request->input('role');
            $users = User::where('role_name',$role_name)->get();
            return $users;

        //  $users = User::all();
        // return view('team.index', compact('users'));
        
        //$role = DB::table("roles")
            //->lists("role_name","role_id");
            //return json_encode($role);, 
            //return response()->json_encode($role);
        //$role = DB::table("roles");
        //->lists("role_name","role_id");

        //return view('role.index')->with ('roles',$role->all());
        //$role=new Role;
        //return response()->json_encode($role);
        
        //return json_encode($role);
    }
    }
}
