<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //table name
    protected $table = 'users';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = false;
}
