@extends('layouts.Menu')
@section('content')
<div class="content">
   <fieldset>
   <legend>Add Attendance</legend>
<form action="{{route('student_attendance.store')}}" method="POST">
  @csrf
  <div class="row">
  
  <div class="col">
    <div class="form-group">
        <label for="check_in" >Lesson </label>
         <input type="number" name="lesson_id" id="" class="form-control" >
  </div>
  </div>

  <div class="col">
        <div class="form-group">
            <label for="status"> status</label>
                <select name="status" id="status" class="form-control" name="status" >
                    <option value="Present">present</option>
                    <option value="Absant">absant</option>
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