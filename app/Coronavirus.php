<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coronavirus extends Model
{
    protected $table = 'historialcoronavirus';
  	protected $primaryKey = 'id';
  	public $timestamps = true;
}
