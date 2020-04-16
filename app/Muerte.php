<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muerte extends Model
{
    protected $table = 'muerte';
  	protected $primaryKey = 'id';
	public $timestamps = false;
	  
	protected $fillable = ['provincia', 'pais', 'latitud','longitud','fecha','total','contador'];
}
