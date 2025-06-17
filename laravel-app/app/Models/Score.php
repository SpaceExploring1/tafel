<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Score extends Authenticatable
{
    protected $table = 'score';
    protected $primaryKey = 'idScore';
    public $timestamps = true;
    protected $fillable = [
        'idTafeltje',
        'score'
    ];
    public function tafel() // PK veranderd van idTafel naar id_Tafel
    {
        return $this->belongsTo(Tafel::class, 'tafeltje');
    }

    public function kindScores() // PK veranderd van idScore naar id_Score
    {
        return $this->hasMany(KindScore::class, 'idScore');
    }
}