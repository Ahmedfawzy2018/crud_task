@if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                    <form action="{{ route('addsubproject') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Add Projects" aria-describedby="emailHelp">
                       
                      </div>
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
