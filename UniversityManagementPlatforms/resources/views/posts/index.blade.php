@extends('layouts.menu')

@section('content')
<div class="row mb-2">
    <div class="col-sm-5">
      <h1>ALL Posts</h1>
    </div>
</div>
@foreach ($topics as $topic)
<div class="card text-center">
    <div class="card-header">
    
        <h4><a href="{{ route('topic.show', $topic) }}">{{ $topic->title }}</a></h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $topic->content }}</h5>
      <span class="badge badge-primary">{{ $topic->user->last_name }}</span>
    </div>
    
    <div class="card-footer text-muted">
        Created At {{ $topic->created_at->format('d/m/Y H:m') }}
    </div>
    
  </div>
  @endforeach
  <div class="d-flex justify-content-center mt-3">
    {{ $topics->links() }}
</div>
@endsection