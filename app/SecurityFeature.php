<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecurityFeature extends Model
{
    protected $fillable = ['secfeature_name', 'secfeature_desc'];

    public $primaryKey = 'SecFeature_id';
}
