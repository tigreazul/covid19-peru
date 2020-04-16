<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testresult extends Model
{
    protected $table = 'data_test_results';
  	protected $primaryKey = 'id';
  	public $timestamps = false;
}
