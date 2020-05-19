@extends('layouts.Menu')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Teachers Reviews</h1>
            </div>
          </div>
        </div>
        @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
      </section>
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Review</th>
                        <th>Review Numbers</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $details)
                      <tr>
                      <td>{{$details->user->first_name}} {{$details->user->last_name}}</td>
                        <td>{{$details->user->email}}</td>
                        <td>{{$details->position}}</td>
                        <td width='20%' style="color:orange">
                          @if($details->nbr_review==0)
                          <span class="badge badge-warning">No Reviews</span>
                            @else
                              @for($i=0;$i<round($details->total_review/$details->nbr_review);$i++)
                                <i class="fas fa-star"></i>
                              @endfor
                          @endif
                        </td>
                        <td>
                        @if($details->nbr_review!=0)
                          {{$details->nbr_review}}
                        @else
                          <span class="badge badge-warning">No Reviews</span>
                        @endif
                        </td>
                        <td>
                          @if($i<3)
                          <a href="{{ route('teachers.show',$details->id)}}">
                            <button class="btn btn-danger">Report</button></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
