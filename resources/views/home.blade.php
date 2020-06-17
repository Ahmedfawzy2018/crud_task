@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                    <form action="{{ route('addproject') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Project Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                       
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <br>
                @if(!empty($projects))
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Project Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($projects as $project)
                        <tr>
                          <th scope="row">#</th>
                          <td>{{ $project->name}}</td>

                          <td>@if($project->tasks() != '0') {{ (App\Models\Task::where('project_id',$project->id)->count() * 100 / $project->tasks()) }} % @else 0 % @endif</td>
                          <td><a href="{{ url('projectdelete',['id' => $project->id ]) }}">Delete</a> &nbsp; <a href="{{ url('projectpage',['id' => $project->id ]) }}">show</a></td>
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
@endsection
