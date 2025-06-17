<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tafel extends Authenticatable
{
    protected $table = 'tafel';
    protected $primaryKey = 'idTafeltje';
    public $timestamps = true;
    protected $fillable = ['nummer'];

    public function scores() // PK veranderd van idTafel naar id_Tafel
    {
        return $this->hasMany(Score::class, 'tafeltje');
    }
}