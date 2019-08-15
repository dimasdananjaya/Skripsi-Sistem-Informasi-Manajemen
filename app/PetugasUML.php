<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PetugasUML extends Authenticatable
{
    use Notifiable;

    

    protected $guard='petugas_uml';
    protected $table = 'petugas_uml';
    public $timestamps = true;
    public $primaryKey='id_petugas_uml';


    public function uml()
    {
        return $this->belongsTo('App\UML','id_uml');
    }
}
