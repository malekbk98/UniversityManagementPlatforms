@extends('layouts.Menu')
@section('content')
<div class="content">
   <fieldset>
   <legend>Add Attendance teacher</legend>
<form action="{{route('teacher_attendance.store')}}" method="POST">
  @csrf
  <div class="row">
  <div class="col">
    <div class="form-group">
        <label for="lesson_id" >lesson </label>
         <input type="number" name="lesson_id" id="" class="form-control" max="50" min="1" >
  </div>
  </div> 


  <div class="col">
        <div class="form-group">
            <label for="status"> status</label>
                <select name="status" id="status" class="form-control" name="status" >
                    <option value="Present">Present</option>
                    <option value="Absant">Absant</option>
                </select>
        </div>
  </div>

      </div>
     
        <div class="form-submitt">
    <button type="submitt" class="btn btn-primary btn-block">Save </button>
    </div>
    </div>
        </form>
        </fieldset>
        </div>
@endsection 