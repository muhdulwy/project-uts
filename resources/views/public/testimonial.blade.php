@extends('layouts.app')
@section('content')
<h1 class="text-white text-3xl font-bold mb-8">Testimonial</h1>

<div class="space-y-6">
    @foreach ($testimonials as $testimonial)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center gap-x-4 mb-2">
                <div class="bg-gray-200 text-gray-700 font-bold rounded-full h-10 w-10 flex items-center justify-center">
                    {{ strtoupper(substr($testimonial->user->name, 0, 1)) }}
                </div>
                <h3 class="text-lg font-semibold">{{ $testimonial->user->name }}</h3>
            </div>
            <p class="text-gray-600 text-sm">{{ $testimonial->saran_masukan }}</p>
        </div>
    @endforeach
</div>
@endsection
