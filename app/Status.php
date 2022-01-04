<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     protected $table = 'statuses';

    protected $fillable = ['title', 'slug', 'order'];

    // public $primaryKey = 'id';

    public $timestamps = false;

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function statuses()
    // {
    //     return $this->hasMany(Status::class)->orderBy('order');
    // }

        // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
}
