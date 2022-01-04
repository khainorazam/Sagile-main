<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $fillable = ['ustory_id', 'type_NFR', 'id_NFR'];

    public $primaryKey = 'id';
}
