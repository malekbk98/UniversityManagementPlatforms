@extends('layouts.Menu')
@section('content')
<div class="container-fluid">

<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Concerned classroom</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

<div class="row">
<div class="col-md-12">
<ul class="list-group">

      @foreach($classatt as $class)
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <h5>{{$class->classe_name}}</h5>
  <small> {{$class->subject_name}}</small>
  
  </li>
  <tr>
  <td><a role="button" class="btn btn-dark" href="{{route('studentclasslist',['parameter'=>$class->classe_id])}}">Add Attendance of the classe
</a> </td>
<br>
  </tr>
         <br>    
              @endforeach
              <ul >
              </div>
              </div>

</div>

@endsection 