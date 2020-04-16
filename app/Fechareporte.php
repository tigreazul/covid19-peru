<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fechareporte extends Model
{
    protected $table = 'fechareporte';
  	protected $primaryKey = 'id';
	public $timestamps = false;
	  
	// protected $fillable = ['fechaReporte'];
}
