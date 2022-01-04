<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $fillable = ['user_story','desc_story','due_day','perfeature_id','SecFeature_id','prio_story','status_title'];

    public $primaryKey = 'u_id';

    public $foreignKey = 'sprint_id';
}