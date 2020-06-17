<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Project ;
use App\Models\Task ;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth') ;
    }

    public function index()
    {
    	// Retrieve all projects to be diplaying for the user
    	$projects = Project::where('user_id',auth()->user()->id)->get() ;

    	return view('home',['projects' => $projects]) ;
    }

    public function addProject(Request $request){
    	$request->validate(['name' => 'required']) ; // Validate the request varibales 
    	$input = $request->only('name') ; // Get variables from the rewuest sent
    	$input['user_id'] = auth()->user()->id ;
    	Project::create($input) ; // Create Project
    	Toastr::success('Project added successfully :)','Success');

    	return redirect()->route('showprojects') ; // Redirect to display schools after success 
    }

    public function delete($id)
    {
    	Project::where('id',$id)->delete();
    	Task::where('project_id',$id)->delete() ;

    	Toastr::success('Project Deleted successfully :)','Success');

    	return redirect()->route('showprojects') ; // Redirect to display schools after success 
    }

    public function show($id)
    {
    	$SubProjects = Task::where('project_id',$id)->get() ;
        $project = Project::find($id);
    	return view('projectPage',['SubProjects' => $SubProjects , 'project' => $project]) ;
    }

    
}
