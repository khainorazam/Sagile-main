<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'role_name', 'country'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function pros()
    {
        return $this->hasMany(Project::class);
    }

    protected static function booted()
    {
        static::created(function ($user) {
            // Create default statuses
            $user->statuses()->createMany([
                [
                    'title' => 'Backlog',
                    'slug' => 'backlog',
                    'order' => 1
                ],
                [
                    'title' => 'Up Next2',
                    'slug' => 'up-next2',
                    'order' => 2
                ],
                [
                    'title' => 'In Progress',
                    'slug' => 'in-progress',
                    'order' => 3
                ],
                [
                    'title' => 'Done',
                    'slug' => 'done',
                    'order' => 4
                ]
            ]);
        });
    }

    // protected static function booted()
    // {
    //     static::created(function ($user) {
    //         // $user = Status::find(1)->statuses()->where('user_id');
    //         // $user = Status::find(1)->select('user_id')->get();
    //         $user = \App\Status::where('user_id', '=', '11', $id)->get();
    //     });
        
    //     // $statuses = new Status;
    //     // if (\Auth::check())
    //     // {
    //     //     $id = \Auth::user()->getId();           
    //     // }
    //     // if($id)
    //     // {
    //     //     $user = \App\Status::where('user_id', '=', $id)->get();
    //     //     return view('statuses.index',['statuses'=>$status, 'users'=>$user]);
    //     // }
      
    //     // return view('project.index')->with ('projects',$project->all());
        
    //     // static::created(function ($user){
    //     //     $user = Status::statuses()->createMany();
    //     // })

     
    //     // $user = DB::table('statuses')->select('user_id')->get();
    //     // $user = User::find(1)->statuses;
    //     // return $user->$statuses()->get();
    // }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function statuses()
    {   
        return $this->hasMany(Status::class)->orderBy('order');
    }

    // public function statuses()
    // {
    //     return $this->belongsToMany('App\Status');
    // }
}
