@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first('email') }}</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
@endsection
