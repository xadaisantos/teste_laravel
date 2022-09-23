@extends('layouts.layout-master')

@section('content')
    <h3>Edit Student</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/students/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" autofocus value="{{ $student->name }}">
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $student->email }}">
        </div>
        <div class="form-group mb-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $student->birth_date }}">
        </div>
        <div class="form-group mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-select">
                @foreach($courses as $course)
                    @if($student->course_id === $course->id)
                    <option value="{{ $course->id }}" selected>{{ $course->title }}</option>
                    @else
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Update Student</button>
    </form>    
@endsection