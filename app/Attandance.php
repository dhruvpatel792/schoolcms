<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attandance extends Model
{
	protected $fillable = [
		'user_id','studentsclass','div','date',
	];
	
}
