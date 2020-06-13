@extends('layouts.Menu')
@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Salary</th>
                    <th>Start Working</th>
                    <th>Position</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                <tr>
                    <td><a href="{{ route('teachers.show', $teacher) }}">{{$teacher->user->first_name}} {{$teacher->user->last_name}}</td>
                    <td>{{$teacher->user->email}}</td>
                    <td>{{$teacher->user->phone}}</td>    
                    <td>{{$teacher->salary}}</td>  
                    <td>{{$teacher->start_date}}</td>  
                    <td>{{$teacher->position}}</td>  
                    <td><a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-success">Edit Teacher</a></td>              
                    <td><form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Teacher</button>
                    </form>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
@endsection