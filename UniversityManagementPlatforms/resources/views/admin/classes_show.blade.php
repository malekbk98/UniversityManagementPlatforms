@extends('layouts.Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $classe->classe_name }}</h5>
            <br>
            <p>{{ $classe->department->department_name}}</p>
            <p>{{ $classe->specialite }}</p>
            <div class="d-flex justify-content-between">
                <small>Created AT {{ $classe->created_at->format('d/m/Y H:m') }}</small>
                <small>Updated AT {{ $classe->updated_at->format('d/m/Y H:m') }}</small>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('classes.index') }}" class="btn btn-secondary">Return</a>
            </div>
        </div>
    </div>
</div>
    
@endsection