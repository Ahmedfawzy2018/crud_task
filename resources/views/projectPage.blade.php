@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $project->name}}   &nbsp; &nbsp; <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 New Task
</button></div>


                    <br>
                @if(!empty($SubProjects))
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Task Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($SubProjects as $subproject)
                        <tr>
                          <th scope="row">#</th>
                          <td>{{ $subproject->name}}</td>
                          <td>{{ $subproject->status}}</td>
                          <td><a href="{{ url('taskdelete',['id' => $subproject->id ]) }}">Delete</a> &nbsp; <a href="{{ url('taskupdate',['id' => $subproject->id ]) }}">update</a></td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Task</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('addsubproject') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Add Projects" aria-describedby="emailHelp">
                       
                      </div>
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
