@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="login-container">
        <h2>Login</h2>
        
        @if ($errors->first())
            <div class="error-message">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="remember">
                <input type="checkbox" id="remember" name="remember">
                Remember Me
            </label>

            <input type="submit" value="Log In">
        </form>
        <p style="margin-top: 15px; color: var(--text-color);">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>
@endsection
