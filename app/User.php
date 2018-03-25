<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Project;

class User extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
	];

	//relationship

	public function projects(){
		
		return $this->belongsToMany('App\Project');
	}

	//accessors
	public function getListOfProjectsAttribute(){
		if($this->role==1)
			return $this->projects;
			
		return Project::all();	
	} 

	public function getIsAdminAttribute(){
		return $this->role==0;
	}
	
	public function getIsSupportAttribute(){
		return $this->role==1;
	}

	public function getIsClientAttribute(){
		return $this->role ==2;
	} 
}
