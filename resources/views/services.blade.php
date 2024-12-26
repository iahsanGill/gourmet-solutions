{{-- services.blade.php --}}
@extends('layouts.master')

@section('title', 'Services by ' . $provider->name)

@section('content')
    <section>
        <h2 class="text-center" style="text-shadow: #000000 2px 2px 4px;">Services by {{ $provider->name }}</h2>
        <div class="provider-info">
            <p>{{ $provider->description ?? 'No description available' }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Lunch Box</th>
                    <th>Price (PKR)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lunchboxes as $lunchbox)
                    <tr>
                        <td>{{ $lunchbox->name }}</td>
                        <td>{{ $lunchbox->price }}</td>
                        <td>
                            <button class="details-btn" data-details-id="details-{{ $lunchbox->id }}">Show Details</button>
                            <button class="hide-btn" data-hide-id="details-{{ $lunchbox->id }}" style="display: none;">Hide Details</button>
                            <button class="order-btn" data-order-id="order-{{ $lunchbox->id }}">Place Order</button>
                        </td>
                    </tr>
                    <tr class="details-row" id="details-{{ $lunchbox->id }}" style="display: none;">
                        <td colspan="3">
                            <div class="details-content">
                                <strong>Ingredients:</strong> {{ $lunchbox->ingredients ?? 'N/A' }} <br>
                                <strong>Nutritional Info:</strong> {{ $lunchbox->nutritional_info ?? 'N/A' }} <br>
                                <strong>Available:</strong> {{ $lunchbox->is_available ? 'Yes' : 'No' }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    @foreach($lunchboxes as $lunchbox)
        <div id="order-{{ $lunchbox->id }}" class="place-order-modal">
            <div class="place-order-modal-content">
                <button class="place-order-modal-close">&times;</button>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="lunchbox_id" value="{{ $lunchbox->id }}">
                    <input type="hidden" name="user_id" value="{{ $provider->id }}">
                    <div class="form-group">
                        <label for="customer-name-{{ $lunchbox->id }}">Name:</label>
                        <input type="text" id="customer-name-{{ $lunchbox->id }}" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-number-{{ $lunchbox->id }}">Contact (Format: 03XX-XXXXXXX):</label>
                        <input type="text" 
                               id="contact-number-{{ $lunchbox->id }}" 
                               name="contact_number" 
                               pattern="03[0-9]{2}-[0-9]{7}"
                               title="Please enter a valid Pakistani phone number (Format: 03XX-XXXXXXX)"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="delivery-address-{{ $lunchbox->id }}">Address:</label>
                        <textarea id="delivery-address-{{ $lunchbox->id }}" name="delivery_address" rows="3" required></textarea>
                    </div>
                    <input type="submit" value="Submit Order">
                </form>
            </div>
        </div>
    @endforeach
@endsection