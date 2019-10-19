<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    //table name
    protected $table = 'dispositivo';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = false;
}
