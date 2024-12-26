<?php

namespace App\Http\Controllers;

use App\Models\LunchBox;
use Illuminate\Http\Request;

class LunchBoxController extends Controller
{
    public function index()
    {
        $lunchBoxes = LunchBox::where('is_available', true)->get();
        return view('menu', compact('lunchBoxes'));
    }

    public function adminIndex()
    {
        $lunchBoxes = LunchBox::all();
        return view('admin.lunchboxes.index', compact('lunchBoxes'));
    }

    public function create()
    {
        return view('admin.lunchboxes.create');
    }

    public function services()
    {
        $lunchboxes = LunchBox::all();
        return view('services', ['lunchboxes' => $lunchboxes]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_available' => 'boolean'
        ]);

        LunchBox::create($validated);

        return redirect()->route('admin.lunchboxes')
            ->with('success', 'Lunch Box created successfully.');
    }

    public function edit(LunchBox $lunchBox)
    {
        return view('admin.lunchboxes.edit', compact('lunchBox'));
    }

    public function update(Request $request, LunchBox $lunchBox)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_available' => 'boolean'
        ]);

        $lunchBox->update($validated);

        return redirect()->route('admin.lunchboxes')
            ->with('success', 'Lunch Box updated successfully.');
    }

    public function destroy(LunchBox $lunchBox)
    {
        $lunchBox->delete();

        return redirect()->route('admin.lunchboxes')
            ->with('success', 'Lunch Box deleted successfully.');
    }
}