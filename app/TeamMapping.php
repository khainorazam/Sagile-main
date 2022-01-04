<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMapping extends Model
{
    protected $table = 'teammappings';

    protected $fillable = ['role_name','username','team_name'];

    public $primaryKey = 'teammapping_id';
}
