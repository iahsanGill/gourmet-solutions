<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index()
    {
        // Show all users who are providers
        $providers = User::all();
        return view('browse', compact('providers'));
    }

    public function showUserServices($userId)
    {
        $provider = User::findOrFail($userId);
        $lunchboxes = $provider->lunchBoxes()->where('is_available', true)->get();
        return view('services', compact('lunchboxes', 'provider'));
    }
}
