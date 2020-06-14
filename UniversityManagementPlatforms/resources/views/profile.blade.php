@extends('layouts.Menu')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
         
        </div>
      </div>
    </section>
<div class="container-md">
<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('storage')}}/{{ $user->photo}}" style="width:150px;height:150px;">
                </div>
                <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}} </h3>

                <p class="text-muted text-center">{{$user->position}}</p>

<form>

<div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Date of birthday</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" value=" " disabled>
    </div>
  </div> 
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="phone" class="form-control" value="{{$user->phone}}" disabled>
    </div>
  </div> 
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Adress</label>
    <div class="col-sm-10">
      <input type="address" class="form-control" value="{{$user->address}}"disabled>
    </div>
  </div> 
  </form>
  <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email"  name="email" class="form-control" value="{{$user->email}}">
    </div>
  </div>
  @error('email')<div class="text-danger">{{$message}}</div>@enderror
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Password </label>
    <div class="col-sm-10">
      <input type="password"  name="password" class="form-control" value="">
    </div>
  </div>
  @error('password')<div class="text-danger">{{$message}}</div>@enderror
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">New password</label>
    <div class="col-sm-10">
      <input type="password" name="new_password"  class="form-control" value="">
    </div>
  </div>
  @error('new_password')<div class="text-danger">{{$message}}</div>@enderror
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Confirm New password</label>
    <div class="col-sm-10">
      <input type="password" name="confirm_password"  class="form-control" value="">
      <input type="text" name="id"  class="form-control" value="{{$user->id}}" hidden>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-lg-2 control-label"> Your Photo</label>
    <div class="col-lg-6">
        <input type="file" name="photo" class="file-pos">
        @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
    </div>
</div>
  @error('confirm_password')<div class="text-danger">{{$message}}</div>@enderror
  <button type="submit" class="btn btn-primary btn-block"><b>change</b></button>
  </form>


               
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        @endsection