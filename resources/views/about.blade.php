{{-- about.blade.php --}}
@extends('layouts.master')

@section('title', 'About Us')

@section('content')
    <section class="about-us-box">
        <h2>About Us</h2>
        <p>School Lunch Boxes in Multan is a growing service that provides fresh, healthy, and varied lunch options for students and staff. With a focus on expanding its customer base across the Punjab region, the business offers gourmet lunch boxes, freshly baked bread, and daily changing hot lunches, all delivered with punctuality and care.</p>
    </section>

    <!-- Vendor Registration Process -->
    <section class="about-us-box" style="margin-top: 20px;">
        <h2>Want to Join as a Vendor?</h2>
        <div class="line"></div>
        <div style="text-align: left; padding: 12px;">
            <h3 style="color: var(--heading-color);">Registration Process:</h3>
            <ol style="color: var(--text-color); font-size: 1.2rem; line-height: 1.8;">
                <li>Click the Register button in the navigation menu</li>
                <li>Fill out the registration form with your details</li>
                <li>After registration, log in to access your dashboard</li>
                <li>Add your business description to your profile</li>
                <li>Start adding your lunch box offerings with prices and details</li>
            </ol>
        </div>
        <div style="margin-top: 20px;">
            @guest
                <a href="{{ route('register') }}" class="view-services-btn">Register Now</a>
            @endguest
        </div>
    </section>

    <section>
        <h2 class="user-reviews-title">What Our Clients Say</h2>
        <div class="line"></div>
        <div>
            @foreach($testimonials as $testimonial)
                <div class="review-box">
                    <p>"{{ $testimonial->content }}"</p>
                    <h3>- {{ $testimonial->author }}</h3>
                </div>
                <div class="line"></div>
            @endforeach
        </div>
    </section>
@endsection