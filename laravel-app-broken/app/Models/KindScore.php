<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class KindScore extends Authenticatable
{
    protected $table = 'kind_score';
    protected $primaryKey = 'idKindScore';
    public $timestamps = true;
    protected $fillable = ['idKind', 'idScore'];

    public function kind() // PK veranderd van idKind naar id_Kind
    {
        return $this->belongsTo(Kind::class, 'idKind');
    }

    public function score() // PK veranderd van idScore naar id_Score
    {
        return $this->belongsTo(Score::class, 'idScore');
    }
    protected static function booted() //als je een delete doet, dan wordt ook de score van die kindscore verwijderd
    {
        static::deleting(function ($kindScore) {
            $kindScore->score()->delete();
        });
    }

}
