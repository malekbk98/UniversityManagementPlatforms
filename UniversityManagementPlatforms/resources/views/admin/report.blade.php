@extends('layouts.Menu')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form action="{{ route('notif.report') }}" method="post">
                  @csrf                  
                  <div class="card-body">
                    <div class="form-group col-md-10">
                      <label for="title">Title</label>
                      <input type="text" value="{{$teacher->user_id}}" style="display: none" name="user_id">
                      @error('user_id')<div class="text-danger">{{ $message }}</div> @enderror
                      <input type="text" class="form-control" name="title" id="title" placeholder="Title" Value="Administration: Bad Review Report" required>
                      @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="message">Message</label>
                        <Textarea class="form-control" name="message" placeholder="Type your message" required>It seems that you had low review rang, you're required to came to the administration office as soon as possible</Textarea>
                        @error('message')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div> 
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>    
@endsection