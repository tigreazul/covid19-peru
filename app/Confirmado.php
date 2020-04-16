<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmado extends Model
{
    protected $table = 'confirmado';
  	protected $primaryKey = 'id';
	public $timestamps = false;
	  
	protected $fillable = ['provincia', 'pais', 'latitud','longitud','fecha','total','contador'];
}
