<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_number' => ['required', 'string', 'regex:/^03[0-9]{2}-[0-9]{7}$/'],
            'delivery_address' => 'required|string',
            'lunchbox_id' => 'required|exists:lunch_boxes,id',
            'user_id' => 'required|exists:users,id'
        ], [
            'contact_number.regex' => 'Please enter a valid phone number (Format: 03XX-XXXXXXX)'
        ]);

        Order::create($validated);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
