<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefectFeature extends Model
{
    protected $table = 'defect_features';

    protected $fillable = ['title, desc'];

    public $primaryKey = 'id';
}
