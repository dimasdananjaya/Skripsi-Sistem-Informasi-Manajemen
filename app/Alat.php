<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    public $timestamps = true;
    public $primaryKey='id_alat';
}
