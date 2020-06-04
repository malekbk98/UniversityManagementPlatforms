@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Edit topic</h1>
        <hr>
        <form action="{{ route('topic.update', $topic) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title topic</label>
                <input type="text" class="form-control" @error('title') is-invalide @enderror name="title" id="title" value="{{ $topic->title }}">
                @error('title')
                    <div class="invalide-feedback">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Paragraph</label>
                <textarea name="content" id="content" class="form-control" @error('content') is-invalide
                @enderror rows="5">{{ $topic->content }}</textarea>
                @error('content')
                    <div class="invalide-feedback">{{ $errors->first('content') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm Edit</button>
        </form>
    </div>
    
@endsection