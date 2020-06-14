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
              <h3>{{$stat['student']}}</h3>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-graduate"></i>
            </div>
            <a href="{{route('students_lists.lists')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['teacher']}}</h3>
                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{route('teachers_lists.lists')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['admin']}}</h3>
                <p>Admins</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-graduate"></i>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$stat['classe']}}</h3>
              <p>Classes</p>
            </div>
            <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="{{route('classes.index')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['department']}}</h3>
                <p>Departments</p>
              </div>
              <div class="icon">
                <i class="far fa-building"></i>
              </div>
              <a href="{{route('departments.index')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['subject']}}</h3>
                <p>Subjects</p>
              </div>
              <div class="icon">
                <i class="fas fa-flask"></i>
              </div>
              <a href="{{route('subjects.index')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        <!-- ./col -->
      <!-- /.row -->
    </div>
</section>
@endsection
