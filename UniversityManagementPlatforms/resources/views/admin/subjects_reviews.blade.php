@extends('layouts.Menu')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Subjects Reviews</h1>
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
                        <th>Subject Name</th>
                        <th>Cof</th>
                        <th>N°:Absences</th>
                        <th>Type</th>
                        <th>Review</th>
                        <th>Review Numbers</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $details)
                      <tr>
                      <td>{{$details->subject_name}}</td>
                        <td>{{$details->subject_cof}}</td>
                        <td>{{$details->subject_max_abs}}</td>
                        <td>{{$details->subject_type}}</td>
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
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$data->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
