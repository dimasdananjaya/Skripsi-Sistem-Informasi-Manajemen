<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasaran extends Model
{
    protected $table = 'pemasaran';
    public $timestamps = true;
    public $primaryKey='id_pemasaran';
}
