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

	//relationship

	public function users(){
		return $this->belongsToMany('App\User');
	}

	public function categories(){
		return $this->hasmany('App\Category');
	}

	public function levels(){
		return $this->hasmany('App\Level');
	}

	//assessors

	public function getFirstLevelIdAttribute(){
		return $this->levels->first()->id;
	}
}
