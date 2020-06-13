@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Create Teacher</h1>
        <hr>
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">User Name</label>
                <br>
                <select class="form-control" name="user_id" id="user_id">
                    <option value="">Select User</option>
                    @foreach ($users as $details)
                    <option value="{{$details->id}}">{{$details->user->first_name}} {{$details->user->last_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" @error('title') is-invalide @enderror name="salary" id="salary">
                @error('salary')
                    <div class="invalide-feedback">{{ $errors->first('salary') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">Start date</label>
                <input type="date" class="form-control" @error('start_date') is-invalide @enderror name="start_date" id="start_date">
                @error('start_date')
                    <div class="invalide-feedback">{{ $errors->first('start_date') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" @error('position') is-invalide @enderror name="position" id="position">
                @error('salary')
                    <div class="invalide-feedback">{{ $errors->first('position') }}</div>
                @enderror
            </div>
            <input type="number" class="form-control" @error('total_review') is-invalide @enderror name="total_review" id="total_review" value=0 hidden>
            <input type="number" class="form-control" @error('nbr_review') is-invalide @enderror name="nbr_review" id="nbr_review" value=0 hidden>
            <button type="submit" class="btn btn-primary">Create teacher</button>
        </form>
    </div>
    
@endsection