<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recuperado extends Model
{
    protected $table = 'recuperado';
  	protected $primaryKey = 'id';
	public $timestamps = false;
	  
	protected $fillable = ['provincia', 'pais', 'latitud','longitud','fecha','total','contador'];
}
