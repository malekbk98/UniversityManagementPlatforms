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
                        <th>Type</th>
                        <th>Review</th>
                        <th>Add Review</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($subject_review as $subject)
                      <tr>
                      <td>{{$subject->subject_name}}</td>
                        <td>{{$subject->subject_cof}}</td>
                        <td>{{$subject->subject_type}}</td>
                        <td width='20%' style="color:orange">
                          @if($subject->nbr_review==0)
                          <span class="badge badge-warning">No Reviews</span>
                            @else
                              @for($i=0;$i<round($subject->total_review/$subject->nbr_review);$i++)
                                <i class="fas fa-star"></i>
                              @endfor
                          @endif
                        </td>
                        <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick=" model( {{ $subject->id}} )">Add Review</button>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">tape your review</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('review_Subject.add_subject_review') }}" method="post">
              @csrf
            <div class="modal-body">
              <div class="rating">
                <input type="text" name="id" id="input_id" hidden>

                <input type="radio" id="one"  value="1" name="total_review1" checked />
                <label for="one"><i class="fa fa-star"></i></label>

                <input type="radio" id="two" value="2" name="total_review1" />
                <label for="two"><i class="fa fa-star"></i></label>

                <input type="radio" id="three" value="3" name="total_review1" />
                <label for="three"><i class="fa fa-star"></i></label>

                <input type="radio" id="four" value="4" name="total_review1" />
                <label for="four"><i class="fa fa-star"></i></label>

                <input type="radio" id="five" value="5" name="total_review1"/>
                <label for="five"><i class="fa fa-star"></i></label>
            </div>
             <!-- <input type="text" name="id" id="input_id" hidden>
              <input type="radio" value="1" name="total_review1">
              <input type="radio" value="2" name="total_review1">    
              <input type="radio" value="3" name="total_review1">
              <input type="radio" value="4" name="total_review1">
              <input type="radio" value="5" name="total_review1">-->
             </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-check"></i>&nbsp; Confirm</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <style>
      @import "compass/css3";
 input[type="radio"] {
	 position: fixed;
	 top: 0;
	 right: 100%;
}
 label {
	 font-size: 1.5em;
	 padding: 0.5em;
	 margin: 0;
	 float: left;
     cursor: pointer;
    transition:0.2s;
}
 input[type="radio"]:checked ~ input + label {
	 background: none;
	 color: #aaa;
}
 input + label {
	 background: #fff;
	 color: orange;
	 margin: 0 0 1em 0;
}
 input + label:first-of-type {
	 border-top-left-radius: 8px;
	 border-bottom-left-radius: 8px;
}
 input:checked + label {
	 border-top-right-radius: 8px;
	 border-bottom-right-radius: 8px;
}
/* hr {
	 clear: both;
	 border: 0;
	 border-top: 2px solid #999;
	 margin: 2em 0;
}*/
    </style>
    <script>
      function model(id) {
         document.getElementById('input_id').value=id;
      }
   </script>
@endsection