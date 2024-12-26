<?php

namespace App\Http\Controllers;

use App\Models\LunchBox;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        // Get all lunch boxes
        $lunchboxes = LunchBox::all();

        // Return the registration view with the lunchboxes data
        return view('register', ['lunchboxes' => $lunchboxes]);
    }
}
