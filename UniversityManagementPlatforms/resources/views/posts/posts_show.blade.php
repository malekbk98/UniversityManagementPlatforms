@extends('layouts.Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $notif->title }}</h5>
            <br>
            <p>{{ $notif->message }}</p>
            <p>{{ $notif->status }}</p>
            <div class="d-flex justify-content-between">
                <small>Posted AT {{ $notif->created_at->format('d/m/Y H:m') }}</small>
                <span class="badge badge-primary">{{ $notif->user->last_name }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">  
                    <a href="{{ route('posts.edit', $notif) }}" class="btn btn-success">Edit Post</a>  
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Return</a>
                    <form action="{{ route('posts.destroy', $notif) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Post</button>
                    </form>
            </div>
        </div>
    </div>
</div>
    
@endsection