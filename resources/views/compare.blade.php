@extends('layouts.main')

@section('container')

    <div id="popup-container">
        <div id="popup-handle"></div>
            <div class="row p-2">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-6 lock-icon" onclick="toggleLock()">
                            <div id="lock-icon"><i class="fa-solid fa-unlock"></i></div>
                        </div>
                    <div class="col-6 text-end close-icon" onclick="closePopup()">
                        <i class="fa-solid fa-square-xmark"></i>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <img src="assets/6.png" alt="Logo" style="width: 80px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="fw-bold text-center mb-4">Comparison</h1>
        <div class="row justify-content-center p-2"> <!-- Menambahkan row untuk grup kolom -->
            @foreach($posts as $post)
                <div class="col-6 p-3"> <!-- Setiap post akan mengambil 6 kolom -->
                    @if ($post->image)
                        <img class="img-fluid rounded-4" src="{{ asset('storage/' . $post->image) }}" alt="image" style="height: 400px; width: 1200px; overflow:hidden;">
                    @else
                        <img class="img-fluid rounded-4" src="https:/source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="image">
                    @endif
                    <h2 class="mt-4">{{ $post->title }}</h2>
                    <p>Category: {{ $post->category->name }}</p>
                    <p class="fw-light mb-4">{{ $post->seri_laptop }}</p>
                    <p class="fw-light mb-4">{{ $post->processor }}</p>
                    <p class="fw-light mb-4">{{ $post->graphic_card }}</p>
                    <p class="fw-light mb-4">{{ $post->ram }}</p>
                    <p class="fw-light mb-4">{{ $post->storage }}</p>
                    <p class="fw-light mb-4">{{ $post->port }}</p>
                    <p class="fw-light mb-4">{{ $post->os }}</p>
                    <p class="fw-light mb-4">Rp{{ number_format($post->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
