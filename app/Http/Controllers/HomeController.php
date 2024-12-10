<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\LunchBox;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->take(3)->get();
        $featuredLunchBoxes = LunchBox::where('is_available', true)->take(4)->get();
        
        return view('home', compact('testimonials', 'featuredLunchBoxes'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = [
            [
                'title' => 'Gourmet Lunch Boxes',
                'description' => 'Elevated lunch experience with premium ingredients',
                'icon' => 'gourmet-icon.svg'
            ],
            [
                'title' => 'Fresh Breakfast',
                'description' => 'Home-made porridge and fresh bread from 7am to 9am',
                'icon' => 'breakfast-icon.svg'
            ],
            [
                'title' => 'Daily Hot Lunches',
                'description' => 'Changing menu with freshly prepared hot meals',
                'icon' => 'hot-lunch-icon.svg'
            ],
            [
                'title' => 'Picnic Packages',
                'description' => 'Custom packages for school trips and events',
                'icon' => 'picnic-icon.svg'
            ]
        ];

        return view('services', compact('services'));
    }
}