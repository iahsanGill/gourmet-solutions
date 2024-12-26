{{-- register.blade.php --}}
@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <section class="login-container">
        <h2>Register Account</h2>
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <input type="submit" value="Register">
        </form>
        <p style="color: var(--text-color);">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </section>
@endsection