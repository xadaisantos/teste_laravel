@extends('layouts.layout-master')

@section('content')
    <h3>Students</h3>
    <a class="btn btn-primary mt-2 mb-2" href="/students/create">Add Student</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>{{ $student->course->title }}</td>
                <td>
                    <a href="/students/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/students/{{ $student->id }}" method="post" class="display-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection