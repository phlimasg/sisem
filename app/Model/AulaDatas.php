<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AulaDatas extends Model
{
    protected $fillable = ['aula_id','sala','predio','dia','dia_libera','dia_bloqueia','aula_ini','aula_fim'];
    
    public function aula(){
        return $this->belongsTo(Aula::class);
    }
    public function turmas(){
        return $this->hasMany(Turmas::class);
    }
}
