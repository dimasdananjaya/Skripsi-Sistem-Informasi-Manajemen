<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UML extends Model
{
    protected $table = 'uml';
    public $timestamps = true;
    public $primaryKey='id_uml';

    /*public function gapoktan(){
        return $this->belongsTo('App\Gapoktan');
    }*/
    
    public function petugasUML()
    {
        return $this->hasOne('App\PetugasUML','id_petugas_uml');
    }
}
