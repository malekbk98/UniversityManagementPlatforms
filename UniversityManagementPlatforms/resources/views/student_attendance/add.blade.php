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
        <label for="check_in" >check in </label>
         <input type="datetime-local" name="check_in" id="check_in" class="form-control" >
  </div>
  </div>

  <div class="col">
        <div class="form-group">
            <label for="status"> status</label>
                <select name="satuts" id="status" class="form-control" name="status" >
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