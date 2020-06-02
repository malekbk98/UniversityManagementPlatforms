@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Create Department</h1>
        <hr>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Department Name</label>
                <input type="text" class="form-control" @error('department_name') is-invalide @enderror name="department_name" id="department_name">
                @error('department_name')
                    <div class="invalide-feedback">{{ $errors->first('department_name') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create </button>
        </form>
    </div>
    
@endsection