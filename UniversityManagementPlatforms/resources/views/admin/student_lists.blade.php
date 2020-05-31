@extends('layouts.Menu')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Students List</h1>
            </div>
          </div>
        </div>
        <div id="search" class="col-sm-12 form-group">
        <div class="d-inline-block">
          <select class="form-control" id="search_option" onchange="search_op()">
            <option value="0">Search by</option>
            <option value="fname">First Name</option>
            <option value="lname">Last Name</option>
            <option value="class">Class</option>
            <option value="dep">Department</option>
            <option value="spec">Speciality</option>
          </select>
        </div>
        <div class="hidden" id="cls">
          <select class="form-control" id="cls_option" onchange="search('cls_option',4)">
            @foreach($cls as $class){
              <option value="{{$class->classe_name}}">{{$class->classe_name}}</option>
            }
            @endforeach
          </select>
        </div>
        <div class="hidden" id="spc">
          <select class="form-control" id="spc_option" onchange="search('spc_option',5)">
            <option>Please Select Speciality</option>
            @foreach($cls as $spc){
              <option value="{{$spc->specialite}}">{{$spc->specialite}}</option>
            }
            @endforeach
          </select>
        </div>
        <div class="hidden" id="dep">
          <select class="form-control" id="dep_option" onchange="search('dep_option',6)">
            <option>Please Select Department</option>
            @foreach($dep as $dept){
              <option value="{{$dept->department_name}}">{{$dept->department_name}}</option>
            }
            @endforeach
          </select>
        </div>
        </div>
      </section>
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Class</th>
                        <th>Specialty</th>
                        <th>Department</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $details)
                      <tr>
                        <td>{{$details->first_name}}</td>
                        <td>{{$details->last_name}}</td>
                        <td>{{$details->email}}</td>
                        <td>{{$details->phone}}</td>
                        <td>{{$details->classe_name}}</td>
                        <td>{{$details->specialite}}</td>
                        <td>{{$details->department_name}}</td>
                      </tr>
                      @endforeach                      
                    </tbody>
                  </table><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
