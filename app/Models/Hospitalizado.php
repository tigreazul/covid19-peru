<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospitalizado extends Model
{
    protected $table = 'data_detalle_hospitalizados';
  	protected $primaryKey = 'id';
  	public $timestamps = false;
}
