<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'order', 'status_name', 'start_date','end_date', 'proj_id'];

    public $primaryKey = 'id';

    public $foreignKey = ['userstory_id','sprint_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
