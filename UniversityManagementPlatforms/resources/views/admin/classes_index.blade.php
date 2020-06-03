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
                <th>Classe Name</th>
                <th>Department Name</th>
                <th>Specialite</th>
                <th>Created At</th>
                <th>Last Update</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($classes as $data)
            <tr>
                <td><a href="{{ route('classes.show', $data) }}">{{ $data->classe_name }}</a></td>
                <td>{{ $data->department->department_name }}</td>
                <td>{{ $data->specialite }}</td>
                <td>{{$data->created_at }}</td>  
                <td>{{$data->updated_at }}</td>     
                <td><a href="{{ route('classes.edit', $data) }}" class="btn btn-success">Edit Classe</a></td>              
                <td><form action="{{ route('classes.destroy', $data) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Classe</button>
                </form>
            </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    
    </div>
    </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $classes->links() }}
    </div>
    </div>
    </div>
    </section>
@endsection