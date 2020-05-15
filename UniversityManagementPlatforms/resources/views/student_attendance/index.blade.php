@extends('layouts.Menu')
@section('content')
<div class="content">
<h4>Your Attendances</h4>

<div class="row">


<div class="col-md-8">
<table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>subject</th>
                      <th>check in</th>
                      <th style="width: 40px">status</th>
                      @foreach($studentatt as $student_attendance)

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      
{{$student_attendance->subject_name}}

                         </td>
                      <td>
        
{{$student_attendance->check_in}}

                      </td>
                      <td>
                      @if($student_attendance->status == "present")
                      
                      <span class="badge bg-success">{{$student_attendance->status}}</span>
                      @else
                      <span class="badge bg-danger">{{$student_attendance->status}}</span>

                      @endif
                      
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>

</div>
<div class="col-md-4">
<div class="content">
<a type="button" class="btn btn-primary float-right" role="button" href="{{route('student_attendance.create')}}" >
  Add attendance
</a>
</div>
</div>


</div>




</div>
@endsection 