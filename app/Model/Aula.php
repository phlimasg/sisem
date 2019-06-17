<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['tema', 'disciplina', 'professor']; 
    
    public function datas(){
        return $this->hasMany(AulaDatas::class);
    }
}
