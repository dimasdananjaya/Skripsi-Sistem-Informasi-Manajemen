<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    public $timestamps = true;
    public $primaryKey='id_produksi';
}
