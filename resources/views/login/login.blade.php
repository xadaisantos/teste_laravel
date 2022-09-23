@extends('layouts.layout-master')

@section('content')
    <form action="/login" method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary mt-3" type="submit">Login!</button>
    </form>

    <div>Usuario teste: teste@teste.com, senha 12345</div>
@endsection