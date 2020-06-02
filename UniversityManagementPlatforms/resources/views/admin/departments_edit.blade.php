@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Edit Department</h1>
        <hr>
        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" class="form-control" @error('department_name') is-invalide @enderror name="department_name" id="department_name" value="{{ $department->department_name }}">
                @error('department_name')
                    <div class="invalide-feedback">{{ $errors->first('department_name') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm Edit</button>
        </form>
    </div>
    
@endsection