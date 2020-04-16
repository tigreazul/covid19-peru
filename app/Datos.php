<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    protected $table = 'virus';
  	protected $primaryKey = 'id';
	public $timestamps = false;
	  
	protected $fillable = ['Provincia', 'Pais', 'ultima_actualziacion','comfirmado','recuperado','muerto','latitud','longitud'];
}
