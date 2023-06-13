<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $fillable = ['user_story','means','perfeature_id','secfeature_id','prio_story','status_id'];

    public $primaryKey = 'u_id';

    public $foreignKey = ['sprint_id', 'proj_id'];
}