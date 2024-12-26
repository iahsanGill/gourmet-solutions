<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display the about page with testimonials.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        // Fetch testimonials from the database
        $testimonials = Testimonial::all();

        // Return the about view with testimonials
        return view('about', ['testimonials' => $testimonials]);
    }
}