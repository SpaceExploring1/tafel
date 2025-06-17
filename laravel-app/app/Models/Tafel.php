<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tafel extends Model
{
    protected $table = 'tafel';
    protected $primaryKey = 'idTafel';
    public $timestamps = true;

    protected $fillable = ['nummer'];
}