@extends('layouts.Menu')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Send Teachers Notif</h1>
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
                      @foreach($notif as $det)
                      <tr>
                      <td>{{$det->user->first_name}} {{$det->user->last_name}}</td>
                        <td>{{$det->user->email}}</td>
                        <td>{{$det->position}}</td>
                        <td width='20%' style="color:orange">
                          @if($det->nbr_review==0)
                          <span class="badge badge-warning">No Reviews</span>
                            @else
                              @for($i=0;$i<round($det->total_review/$det->nbr_review);$i++)
                                <i class="fas fa-star"></i>
                              @endfor
                          @endif
                        </td>
                        <td>
                        @if($det->nbr_review!=0)
                          {{$det->nbr_review}}
                        @else
                          <span class="badge badge-warning">No Reviews</span>
                        @endif
                        </td>
                        <td>
                          <a href="{{ route('teachers.show',$det->id)}}">
                            <button class="btn btn-danger btn-sm">Send Notif</button></a>
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
