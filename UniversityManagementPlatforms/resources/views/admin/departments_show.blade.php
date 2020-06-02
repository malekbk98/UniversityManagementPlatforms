@extends('layouts.Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $department->department_name }}</h5>
            <br>
            <div class="d-flex justify-content-between">
                <small>Created AT {{ $department->created_at->format('d/m/Y H:m') }}</small>
                <small>Updated AT {{ $department->updated_at->format('d/m/Y H:m') }}</small>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Return</a>
            </div>
        </div>
    </div>
</div>
    
@endsection