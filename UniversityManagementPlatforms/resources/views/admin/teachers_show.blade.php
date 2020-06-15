@extends('layouts.Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Name: {{ $teach->user->first_name }} {{ $teach->user->last_name }}</h5>
            <br>
            
            <p>Email: {{ $teach->user->email }}</p>
            <p>Date of birth: {{ $teach->user->birthday }}</p>
            <div class="d-flex justify-content-between">
                <small>Created AT {{ $teach->created_at->format('d/m/Y H:m') }}</small>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
               <a href="{{ route('teachers_index.home') }}" class="btn btn-secondary">Return</a>
            </div>
        </div>
    </div>
</div>
    
@endsection