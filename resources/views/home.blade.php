@extends('layouts.master')

@section('title', 'Home - School Lunch Boxes')

@section('content')
<div class="container mx-auto px-4">
    <section class="text-center mb-12">
        <h1 class="text-4xl font-bold text-green-800 mb-4">
            Fresh, Healthy, Delicious Lunch Boxes
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Providing nutritious and varied lunch options for schools in the Punjab region
        </p>
    </section>

    <section class="grid md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-green-700 mb-3">Variety</h3>
            <p>Daily changing menus with diverse, exciting lunch options</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-green-700 mb-3">Health</h3>
            <p>Nutritionally balanced meals prepared with fresh, high-quality ingredients</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-green-700 mb-3">Convenience</h3>
            <p>Easy ordering and timely delivery directly to schools</p>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-6 text-green-800">
            Our Featured Lunch Boxes
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredLunchBoxes as $lunchBox)
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <h3 class="text-xl font-semibold mb-3">{{ $lunchBox->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $lunchBox->description }}</p>
                    <p class="text-green-700 font-bold">
                        Price: ${{ number_format($lunchBox->price, 2) }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-green-50 p-8 rounded-lg">
        <h2 class="text-3xl font-bold text-center mb-6 text-green-800">
            What Our Clients Say
        </h2>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($testimonials as $testimonial)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <blockquote class="italic text-gray-600 mb-4">
                        "{{ $testimonial->content }}"
                    </blockquote>
                    <footer class="font-semibold text-green-700">
                        - {{ $testimonial->author }}
                    </footer>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection