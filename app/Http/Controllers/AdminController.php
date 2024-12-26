<?php

namespace App\Http\Controllers;

use App\Models\LunchBox;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $lunchboxes = auth()->user()->lunchBoxes;
        $orders = auth()->user()->receivedOrders()
                        ->with('lunchbox')
                        ->latest()
                        ->get();
        
        return view('admin.dashboard', compact('lunchboxes', 'orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_available' => 'boolean'
        ]);

        // Add a dummy description
        $validated['description'] = 'A delicious lunch box option';
        
        $validated['user_id'] = auth()->id();
        LunchBox::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Lunch box created successfully');
    }

    public function edit($id)
    {
        $lunchbox = LunchBox::findOrFail($id);
        return response()->json($lunchbox);
    }

    public function update(Request $request, $id)
    {
        $lunchbox = LunchBox::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_available' => 'boolean'
        ]);

        // Keep the existing description or set dummy if none exists
        $validated['description'] = $lunchbox->description ?? 'A delicious lunch box option';

        $lunchbox->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Lunch box updated successfully');
    }

    public function destroy($id)
    {
        $lunchbox = LunchBox::findOrFail($id);
        $lunchbox->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Lunch box deleted successfully');
    }

    public function updateDescription(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:500'
        ]);

        auth()->user()->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Description updated successfully');
    }
}
