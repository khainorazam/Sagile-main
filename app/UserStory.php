<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $fillable = ['user_story','desc_story','perfeature_id','secfeature_id','prio_story','title'];

    public $primaryKey = 'u_id';

    public $foreignKey = 'sprint_id';
}