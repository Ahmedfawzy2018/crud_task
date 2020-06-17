<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User ;
use App\Models\Task ;
class Project extends Model
{
    protected $table="project";
    protected $fillable = ['name','user_id','status'];

    public function user()
    {
    	return User::find($this->user_id) ;
    }

    public function tasks(){

    	$task = Task::where('project_id',$this->id)->where('status','done')->count() ;
  
    	return $task ;
    }
}
