@extends('layouts.Menu')

@section('content')
    <div class="container">
        <h1>Edit Schedule</h1>
        <hr>
        <form action="{{ route('schedules.update', $lesson) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Subject Name</label>
                <br>
                <select class="form-control" name="subject_id" id="subject_id">
                    <option value="">Select Subject</option>
                    @foreach ($subject as $details)
                    <option value="{{$details->id}}" {{ $lesson->subject_id == $details->id ? 'selected' : ''}}>{{$details->subject_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="title">Classe Name</label>
                <br>
                <select class="form-control" name="classe_id" id="classe_id">
                    <option value="">Select Classe</option>
                    @foreach ($class as $details)
                    <option value="{{$details->id}}" {{ $lesson->classe_id == $details->id ? 'selected' : ''}}>{{$details->classe_name}}</option>   
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="title">Classroom</label>
                <input type="number" class="form-control" @error('classroom') is-invalide @enderror name="classroom" id="classroom" value={{$lesson->classroom}}>
                @error('classroom')
                    <div class="invalide-feedback">{{ $errors->first('classroom') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Start Time</label>
                <input type="time" class="form-control" @error('start_time') is-invalide @enderror name="start_time" id="start_time" value={{$lesson->start_time}}>
                @error('start_time')
                    <div class="invalide-feedback">{{ $errors->first('start_time') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">End Time</label>
                <input type="time" class="form-control" @error('end_time') is-invalide @enderror name="end_time" id="end_time" value={{$lesson->end_time}}>
                @error('end_time')
                    <div class="invalide-feedback">{{ $errors->first('end_time') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Week Day</label>
                <input type="date" class="form-control" @error('week_day') is-invalide @enderror name="week_day" id="week_day" value={{$lesson->week_day}}>
                @error('week_day')
                    <div class="invalide-feedback">{{ $errors->first('week_day') }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Confirm Edit</button>
        </form>
    </div>
    
@endsection