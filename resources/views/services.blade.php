@extends('layouts.master')

@section('title', 'Our Services - School Lunch Boxes')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold text-green-800 text-center mb-12">
        Our Comprehensive Services
    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <div class="mb-4 flex justify-center">
                    <img src="{{ asset('images/icons/' . $service['icon']) }}" 
                         alt="{{ $service['title'] }}" 
                         class="w-16 h-16 text-green-600">
                </div>
                <h3 class="text-2xl font-semibold text-green-700 mb-4">
                    {{ $service['title'] }}
                </h3>
                <p class="text-gray-600">
                    {{ $service['description'] }}
                </p>
            </div>
        @endforeach
    </div>

    <section class="mt-16 text-center">
        <h2 class="text-3xl font-bold text-green-800 mb-6">
            Our Commitment to Quality
        </h2>
        <p class="max-w-3xl mx-auto text-gray-700 text-lg">
            At School Lunch Boxes, we are dedicated to providing nutritious, delicious, 
            and varied meal options. Our focus on health, freshness, and convenience 
            sets us apart in the school catering industry.
        </p>