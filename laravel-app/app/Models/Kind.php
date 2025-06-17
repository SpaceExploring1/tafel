<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Kind extends Authenticatable
{
    protected $table = 'kind';
    protected $primaryKey = 'idKind';
    public $timestamps = true;

    protected $fillable = [
        'gebruikersnaam',
        'wachtwoord',
    ];

    protected $hidden = [
        'wachtwoord',
    ];

    public function kindScores() // PK veranderd van idKind naar id_Kind
    {
        return $this->hasMany(KindScore::class, 'idKind');
    }
    
    protected static function booted()
    {
        static::deleting(function ($kind) {
            foreach ($kind->kindScores as $kindScore) {
                $kindScore->delete(); // Это вызовет каскад на score
            }
        });
    }

}
