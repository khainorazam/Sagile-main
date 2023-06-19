<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'order', 'start_date','end_date', 'proj_id'];

    public $primaryKey = 'id';

    public $foreignKey = ['userstory_id','sprint_id','status_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
