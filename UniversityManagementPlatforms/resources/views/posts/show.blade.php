@extends('layouts.Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $topic->title }}</h5>
            <br>
            <p>{{ $topic->content }}</p>
            <div class="d-flex justify-content-between">
                <small>Posted AT {{ $topic->created_at->format('d/m/Y H:m') }}</small>
                <span class="badge badge-primary">{{ $topic->user->last_name }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                @can('update', $topic)
                    <a href="{{ route('topic.edit', $topic) }}" class="btn btn-success">Edit Topic</a>
                @endcan
                    <a href="{{ route('topic.index') }}" class="btn btn-secondary">Return</a>
                @can('delete', $topic)
                    <form action="{{ route('topic.destroy', $topic) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Topic</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
    
@endsection