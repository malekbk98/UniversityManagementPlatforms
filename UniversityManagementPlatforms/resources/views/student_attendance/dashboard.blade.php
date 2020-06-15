@extends('layouts.Menu')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
      <!-- Small Box (Stat card) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$stat['sub_nbr']}}</h3>
              <p>Subject</p>
            </div>
            <div class="icon">
              <i class="fa fa-flask"></i>
            </div>
            <a href="{{Route('schedule_student.index1')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$stat['att_nbr']}}</h3>
              <p>My Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock"></i>
            </div>
            <a href="{{Route('student_attendance.index')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div>
</section>
@endsection
