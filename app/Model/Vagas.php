<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class vagas extends Model
{
    protected $fillable = ['quantidade','aula_data_id']; 
    
    public function datas(){
        return $this->hasOne(AulaDatas::class);
    }
    public function turmas(){
        return $this->hasMany(turmas::class);
    }
}
