@extends('layouts.Menu')
@section('content')
<!-- style="top: 49px; height: 101px" -->
<div class="">
<table class="table" > 
<thead>
<tr>
<th style= "text-align:center;">Monday</th>
<th style= "text-align:center;">Tuesday</th>
<th style= "text-align:center;">Wednesday</th>
<th style= "text-align:center;">Thursday</th>
<th style= "text-align:center;">Friday</th>
<th style= "text-align:center;">Saturday</th>

</tr>
</thead>
<tbody>
<tr>
<td  >
<ul style="list-style-type:none;">


@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) == "Monday" )

<li >
<div class="card text-white bg-dark mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
    <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  </li>
  @endif

  @endforeach


</ul >

</td>
<td  >
<ul style="list-style-type:none;">

@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) =="Tuesday" )

<li>
<div class="card text-white bg-danger mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
  <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  </li>
  @endif
  @endforeach
  


</ul>

</td>

<td  > 
<ul style="list-style-type:none;">


@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) =="Wednesday" )

<li >
<div class="card text-white bg-warning mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
  <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  @endif

  @endforeach

  </li>



</ul>

</td><td  >
<ul style="list-style-type:none;">


@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) =="Thursday" )

<li>
<div class="card text-white bg-info mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
  <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  </li>
  @endif

  @endforeach


</ul>

</td>
<td  >
<ul style="list-style-type:none;">


@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) =="Friday" )

<li>
<div class="card text-white bg-success mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
  <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  </li>
  @endif

  @endforeach


</ul>

</td>
<td  >
<ul style="list-style-type:none;">

@foreach($student_schedule as $schedule )
@if(date('l', strtotime($schedule->week_day)) =="Saturday" )
<li>
<div class="card text-white bg-dark mb-3" style="width: 12rem; max-height: 11rem;">
  <div class="card-body">
  <p class="card-title">{{$schedule->start_time}} -{{$schedule->end_time}}</p>
    <p class="card-text">{{$schedule->subject_name}}</p>
    <h5 class="card-title">Classroom{{$schedule->classroom}}</h5>

  </div>
  </li>
  @endif

  @endforeach


</ul>

</td>
</tr>


</tbody>

</table>

</div>


@endsection 