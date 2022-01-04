<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodingStandard extends Model
{
    protected $table = 'coding_standards';

    protected $fillable = ['codestand_name'];

    public $primaryKey = 'codestand_id';
}
