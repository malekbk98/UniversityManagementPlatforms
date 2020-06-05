@extends('layouts.menu')

@section('content')
<div class="row mb-2">
    <div class="col-sm-5">
      <h1>ALL Posts</h1>
    </div>
</div>
@foreach ($notifs as $notif)
<div class="card text-center">
    <div class="card-header">
    
        <h4><a href="{{ route('posts.show', $notif) }}">{{ $notif->title }}</a></h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $notif->message }}</h5>
      <p class="card-text">{{ $notif->status }}</p>
      <span class="badge badge-primary">{{ $notif->user->last_name }}</span>
    </div>
    
    <div class="card-footer text-muted">
        Created At {{ $notif->created_at->format('d/m/Y H:m') }}
    </div>
    
  </div>
  @endforeach
  <div class="d-flex justify-content-center mt-3">
    {{ $notifs->links() }}
</div>
@endsection