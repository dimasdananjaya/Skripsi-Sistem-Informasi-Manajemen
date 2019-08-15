<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditi extends Model
{
    protected $table = 'komoditi';
    public $timestamps = true;
    public $primaryKey='id_komoditi';
}
