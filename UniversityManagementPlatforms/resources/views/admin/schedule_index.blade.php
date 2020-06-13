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
                <th>Subject Name</th>
                <th>classroom</th>
                <th>Start Time </th>
                <th>End Time</th>
                <th>Week Day</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($lesson as $data)
            <tr>
                <td>{{ $data->subject->subject_name }}</td>
                <td>{{ $data->classe->classe_name }}</a></td>
                <td>{{ $data->classroom }}</td>
                <td>{{$data->start_time }}</td>  
                <td>{{$data->end_time }}</td>
                <td>{{$data->week_day }}</td>     
                <td><a href="{{ route('schedules.edit', $data) }}" class="btn btn-success">Edit Schedule</a></td>              
                <td><form action="{{ route('schedules.destroy', $data) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Schedule</button>
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
        {{ $lesson->links() }}
    </div>
    </div>
    </div>
    </section>
@endsection