{{-- contact.blade.php --}}
@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
    <section class="contact-info-box">
        <h2>Contact Information</h2>
        <p>Phone: <a href="tel:+123456789">+1 (234) 567-89</a></p>
        <p>Email: <a href="mailto:info@gourmetlunchsolutions.com">info@gourmetlunchsolutions.com</a></p>
        <p>Fax: <a href="fax:+123456789">+1 (234) 567-89</a></p>
    </section>

    <section>
        <h2 class="text-center small-h2">Get in Touch</h2>
        <form action="" method="post">
            @csrf

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </section>
@endsection