@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Create Subjects</h1>
        <hr>
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Subject Name</label>
                <input type="text" class="form-control" @error('subject_name') is-invalide @enderror name="subject_name" id="subject_name">
                @error('subject_name')
                    <div class="invalide-feedback">{{ $errors->first('subject_name') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Teacher Name</label>
                <br>
                <select class="form-control" name="teacher_id" id="teacher_id">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $details)
                    <option value="{{$details->id}}">{{$details->user->first_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="subject_cof">Coeficient Subject</label>
                <input type="number" class="form-control" @error('subject_cof') is-invalide @enderror name="subject_cof" id="subject_cof">
                @error('subject_cof')
                    <div class="invalide-feedback">{{ $errors->first('subject_cof') }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject_max_abs">Subject Max Absent</label>
                <input type="number" class="form-control" @error('subject_max_abs') is-invalide @enderror name="subject_max_abs" id="subject_max_abs">
                @error('subject_max_abs')
                    <div class="invalide-feedback">{{ $errors->first('subject_max_abs') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="subject_type">Subject Type</label>
                <input type="text" class="form-control" @error('subject_type') is-invalide @enderror name="subject_type" id="subject_type">
                @error('subject_type')
                    <div class="invalide-feedback">{{ $errors->first('subject_type') }}</div>
                @enderror
            </div>
            <input type="number" class="form-control" @error('total_review') is-invalide @enderror name="total_review" id="total_review" value=0 hidden>
            <input type="number" class="form-control" @error('nbr_review') is-invalide @enderror name="nbr_review" id="nbr_review" value=0 hidden>
            <button type="submit" class="btn btn-primary">Create Subject</button>
        </form>
    </div>
    
@endsection