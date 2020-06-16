<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Task ;
class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth') ;
    }

    public function index($id)
    {
    	$subprojects = SubProject::where('project_id' ,$id)->get() ;
    	return view('projectPage',['subprojects' => $subprojects]) ;
    }

    public function addsub(Request $request)
    {
    	$request->validate(['name' => 'required']) ; // Validate the request varibales 
    	$input = $request->only('name') ; // Get variables from the rewuest sent
    	$input['project_id'] = $request->input('project_id') ;
    	Task::create($input) ; // Create Project
    	Toastr::success('Project added successfully :)','Success');

    	return redirect()->route('projectpage',['id' => $request->input('project_id')]) ; // Redirect to display schools after success 
    }

    public function delete($id)
    {
        Task::where('id',$id)->delete();

        Toastr::success('Task Deleted successfully :)','Success');

        return redirect()->back() ; // Redirect to display schools after success 
    }

    public function taskupdate($id)
    {
        Task::where('id',$id)->update(['status' => 'done']) ;
        Toastr::success('Task Finished successfully :)','Success');

        return redirect()->back() ; // Redirect to display schools after success 
    }
}
