<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Project extends Model
{
	use SoftDeletes;

	public static $rules=[
		'name'=>'required',
		//'description'=>'',
		'start'=>'date'
	];

	public static $messages =[
		'name.required'=>'Es necesario ingresar un nombre para el proyecto.',
		'start.date'=>'Lafecha no tiene un formato adecuado.'
	];

	protected $fillable = [
        'name', 'description', 'start',
    ];


}
