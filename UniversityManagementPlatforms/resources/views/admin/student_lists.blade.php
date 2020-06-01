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
        <div class="row">
          <div id="search" class="col-sm-10 form-group">
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
          <div class="col-sm-2 form-group">
              <button type="button" class="btn btn-success" id="mod" data-toggle="modal" data-target="#myModal" onmouseover="check()">Send Notification</button>
          </div>
        </div>
      </section>
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @if (session('alert'))
              <div class="alert alert-success">
                  {{ session('alert') }}
              </div>
              @endif
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped" id="myTable">
                    <thead>
                      @error('checked')<div class="text-danger">{{ $message }}</div> @enderror
                      <tr>
                        <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"></th>
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
                      <form action="{{ route('notif_grp.notif_group') }}" method="post">
                        @csrf                  
                        @foreach($data as $details)
                        <tr>
                        <td><input class="form-control" type="checkbox" name="checked[{{$details->user_id}}]" value="{{$details->user_id}}"></td>
                          <td>{{$details->first_name}}</td>
                          <td>{{$details->last_name}}</td>
                          <td>{{$details->email}}</td>
                          <td>{{$details->phone}}</td>
                          <td>{{$details->classe_name}}</td>
                          <td>{{$details->specialite}}</td>
                          <td>{{$details->department_name}}</td>
                        </tr>
                        @endforeach
                        <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Send Notification</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" Value="Administration: Bad Review Report" required>
                                  @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <Textarea class="form-control" name="message" rows="5" placeholder="Type your message" required>It seems that you had low review rang, you're required to came to the administration office as soon as possible</Textarea>
                                    @error('message')<div class="text-danger">{{ $message }}</div> @enderror
                                  </div>
                              </div> 
                          
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Send</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </form>                      
                    </tbody>
                  </table><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
