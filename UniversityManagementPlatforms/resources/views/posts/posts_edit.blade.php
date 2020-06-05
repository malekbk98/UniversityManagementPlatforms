@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <hr>
        <form action="{{ route('posts.update', $notif) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title Post</label>
                <input type="text" class="form-control" @error('title') is-invalide @enderror name="title" id="title" value="{{ $notif->title }}">
                @error('title')
                    <div class="invalide-feedback">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" @error('message') is-invalide
                @enderror rows="5"></textarea>
                @error('message')
                    <div class="invalide-feedback">{{ $errors->first('message') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" @error('status') is-invalide @enderror name="status" id="status" value="{{ $notif->status }}">
                @error('status')
                    <div class="invalide-feedback">{{ $errors->first('status') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm Edit</button>
        </form>
    </div>
    
@endsection