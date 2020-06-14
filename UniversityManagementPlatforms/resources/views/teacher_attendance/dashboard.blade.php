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
              <p>My Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-graduate"></i>
            </div>
            <a href="{{route('classelist')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['classe']}}</h3>
                <p>My Classes</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="{{route('classelist')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stat['classe']}}</h3>
                <p>My Subjects</p>
              </div>
              <div class="icon">
                <i class="fas fa-flask"></i>
              </div>
              <a href="{{route('classelist')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
      </div>
</section>
@endsection
