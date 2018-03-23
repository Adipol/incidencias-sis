<?php

namespace App;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
	use SoftDeletes;

    protected $fillable=['name','project_id'];

	public function project(){
		return $this->belongsTo('App\Project');
	}

}
