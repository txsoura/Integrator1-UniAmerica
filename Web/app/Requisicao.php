<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    //table name
    protected $table = 'requisicao';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = false;
}
