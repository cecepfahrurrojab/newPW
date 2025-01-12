@extends('layouts.app')

@section('title', 'Berita Kampus')

@section('content')
<div x-data="carousel()" class="max-w-7xl mx-auto mt-8">
    <div class="relative">
        <!-- Slides -->
        <div class="overflow-hidden relative">
            <div
                class="flex transition-transform duration-500 ease-in-out"
                :style="{ transform: 'translateX(' + (-currentSlide * 100) + '%)' }"
            >
                @foreach($news as $item)
                    <div class="flex-none w-full">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-64 object-cover rounded-lg shadow-lg">
                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-green-700">{{ $item->title }}</h3>
                            <p class="mt-2 text-green-600">{{ Str::limit($item->content, 100) }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Controls -->
        <div class="flex justify-center mt-4 space-x-3">
            <button @click="prevSlide" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">&lt;</button>
            <button @click="nextSlide" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">&gt;</button>
        </div>
    </div>
</div>

<script>
    function carousel() {
        return {
            currentSlide: 0,
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + {{ count($news) }}) % {{ count($news) }};
            },
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % {{ count($news) }};
            }
        }
    }
</script>
@endsection
