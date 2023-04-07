<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['user_id','team_name', 'proj_name','proj_desc','start_date','end_date'];

    //public $foreignKey = 'user_id';
     
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


