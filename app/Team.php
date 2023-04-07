<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['team_name','proj_name'];

    public $primaryKey = 'team_id';
}
