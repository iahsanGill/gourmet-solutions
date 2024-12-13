@extends('layouts.master')  <!-- Assuming master layout is used -->

@section('content')
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Price (PKR)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="serviceTableBody">
            @foreach($lunchBoxes as $lunchBox)
                <tr>
                    <td>{{ $lunchBox->name }}</td>
                    <td>{{ number_format($lunchBox->price, 2) }}</td>
                    <td>
                        <button class="details-btn" data-details-id="details-{{ $lunchBox->id }}">Show Details</button>
                        <button class="hide-btn" data-hide-id="details-{{ $lunchBox->id }}">Hide Details</button>
                    </td>
                </tr>
                <tr class="details-row" id="details-{{ $lunchBox->id }}">
                    <td colspan="3">
                        <div class="details-content">
                            <strong>Delivery Time:</strong> {{ $lunchBox->delivery_time ?? 'N/A' }} <br>
                            <strong>Meal:</strong> {{ $lunchBox->description }} <br>
                            <strong>Nutritional Info:</strong> {{ $lunchBox->nutritional_info ?? 'N/A' }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection