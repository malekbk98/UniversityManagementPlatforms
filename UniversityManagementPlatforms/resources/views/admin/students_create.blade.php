@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Create Student</h1>
        <hr>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">User Name</label>
                <br>
                <select class="form-control" name="user_id" id="user_id">
                    <option value="">Select User</option>
                    @foreach ($users as $details)
                    <option value="{{$details->id}}">{{$details->first_name}} {{$details->last_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="title">Classe Name</label>
                <br>
                <select class="form-control" name="classe_id" id="classe_id">
                    <option value="">Select Classe</option>
                    @foreach ($classes as $details)
                    <option value="{{$details->id}}">{{$details->classe_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <input type="number" class="form-control" @error('total_review') is-invalide @enderror name="total_review" id="total_review" value=0 hidden>
            <input type="number" class="form-control" @error('nbr_review') is-invalide @enderror name="nbr_review" id="nbr_review" value=0 hidden>
            <button type="submit" class="btn btn-primary">Create Student</button>
        </form>
    </div>
    
@endsection