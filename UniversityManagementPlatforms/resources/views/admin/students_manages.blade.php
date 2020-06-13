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
                <th>Birthday</th>
                <th>Adress</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
            <tr>
                <td>{{$student->user->first_name}} {{$student->user->last_name}}</td>
                <td>{{$student->user->email}}</td>
                <td>{{$student->user->birthday}}</td>    
                <td>{{$student->user->address}}</td>    
                <td>{{$student->user->phone}}</td>    
                <td><a href="{{ route('students.edit', $student) }}" class="btn btn-success">Edit student</a></td>              
                <td><form action="{{ route('students.delete', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Student</button>
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