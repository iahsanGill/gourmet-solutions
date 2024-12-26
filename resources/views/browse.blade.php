@extends('layouts.master')

@section('title', 'Browse Providers')

@section('content')
    <div class="browse-container">
        <h2 class="text-center" style="text-shadow: #000000 2px 2px 4px;">Browse Our Food Providers</h2>
        <div class="providers-grid">
            @foreach($providers as $provider)
                <div class="provider-card">
                    <h3>{{ $provider->name }}</h3>
                    <p>{{ $provider->description ?? 'No description available' }}</p>
                    <a href="{{ route('services.by.user', $provider->id) }}" class="view-services-btn">View Services</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
