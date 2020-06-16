<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project ;
class Task extends Model
{
    protected $table="tasks";
    protected $fillable = ['name','project_id','status'];

    public function project() 
    {
    	return Project::find($this->project_id) ;
    }
}
