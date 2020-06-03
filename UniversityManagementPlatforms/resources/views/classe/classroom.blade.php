@extends('layouts.Menu')
@section('content')


<div class="container-fuild"></div>
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> Classe attendance  </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
   
<table class="table table-hover ">
  <thead>
    <tr>

      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">birthday</th>
      <th scope="col">Present</th>
      <th scope="col">Absent</th>



    </tr>
  </thead>
  
  <tbody>
  <tr> <td> 
  <form action="{{route('class_attendance')}}" method="post"> 
  @csrf
  <h5>Attendance of lesson N  <input  class="form-group"type="number" name="lesson_id" max ="50" min="1"id=""></h5>
  </td></tr>

  @foreach($classroom as $students)

    <tr>

      <th scope="row">{{$students->id}} </th>
      <td >{{$students->first_name}} </td>
      <td>{{$students->last_name}}</td>
      <td>{{$students->birthday}}</td>
     

      <td align="center">
<input type="radio"  style="height:35px; width:35px; vertical-align: middle; color: #51B75F;" name="status[{{$students->id}}]" value="present">
                  </td>
                  <td align="center">
<input type="radio" style="height:35px; width:35px; vertical-align: middle;" name="status[{{$students->id}}]" value="absent">
                  </td>
    
      
    </tr>
    @endforeach
    <tr><td colspan="5"><button class="btn btn-outline-info btn-lg btn-block" type="submit">Submitt</button></td></tr>
    </form>
   
  </tbody>
</table>

</div>


@endsection 