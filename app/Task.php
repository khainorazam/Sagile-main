<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'order', 'status_id', 'start_date','end_date'];

    public $primaryKey = 'id';

    public $foreignKey = ['u_id','sprint_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
