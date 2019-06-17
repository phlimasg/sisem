<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class turmas extends Model
{
    protected $fillable = ['turma','vaga_id','aula_data_id']; 
    
    public function datas(){
        return $this->hasOne(AulaDatas::class);
    }
    public function vagas(){
        return $this->hasOne(vagas::class);
    }
}
