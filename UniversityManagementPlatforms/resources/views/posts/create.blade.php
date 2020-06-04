@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <hr>
        <form action="{{ route('Posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title Post</label>
                <input type="text" class="form-control" @error('title') is-invalide @enderror name="title" id="title">
                @error('title')
                    <div class="invalide-feedback">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Paragraph</label>
                <textarea name="content" id="content" class="form-control" @error('content') is-invalide
                @enderror rows="5"></textarea>
                @error('content')
                    <div class="invalide-feedback">{{ $errors->first('content') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create topic</button>
        </form>
    </div>
    
@endsection