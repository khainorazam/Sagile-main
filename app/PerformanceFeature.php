<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceFeature extends Model
{
    protected $table = 'performance_features';

    protected $fillable = ['perfeature_name'];

    public $primaryKey = 'perfeature_id';
    
    // public $foreignkey = 'perfeature_id';
}
