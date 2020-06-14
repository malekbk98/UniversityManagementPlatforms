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
                <th>Subject Name</th>
                <th>Coeficient</th>
                <th>Max Absent</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Last Update</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($subjects as $data)
            <tr>
                <td><a>{{ $data->subject_name}}</a></td>
                <td>{{ $data->subject_cof }}</td>
                <td>{{ $data->subject_max_abs }}</td>
                <td>{{ $data->subject_type }}</td>
                <td>{{$data->created_at }}</td>  
                <td>{{$data->updated_at }}</td>     
                <td><a href="{{ route('subjects.edit', $data) }}" class="btn btn-success">Edit Subject</a></td>              
                <td><form action="{{ route('subjects.destroy', $data) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Subject</button>
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
        {{ $subjects->links() }}
    </div>
    </div>
    </div>
    </section>
@endsection