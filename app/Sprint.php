<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprint';

    protected $fillable = ['sprint_name','proj_name','sprint_desc','start_sprint','end_sprint','users_name'];

    public $primaryKey = 'sprint_id';
}