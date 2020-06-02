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
                <th>Departement Name</th>
                <th>Created AT</th>
                <th>Last Update</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($departements as $details)
            <tr>
                <td><a href="{{ route('departments.show', $details) }}">{{$details->department_name}}</a></td>
                <td>{{$details->created_at}}</td>
                <td>{{$details->updated_at}}</td>      
                <td><a href="{{ route('departments.edit', $details) }}" class="btn btn-success">Edit Department</a></td>              
                <td><form action="{{ route('departments.destroy', $details) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Department</button>
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