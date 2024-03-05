

@extends('layouts.main')
{{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}

@section('container')

<div class="row justify-content-center">
    <div class="col-md-8">
        <article class="mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    @if ($post->image)
                        <img class="img-fluid rounded-4" src="{{ asset('storage/' . $post->image) }}" alt="image" style="height: 400px; width: 1200px; overflow:hidden;">
                    @else
                        <img class="img-fluid rounded-4" src="https:/source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="image">
                    @endif
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <h3>{{ $post->title }}</h3>
                    <p><span class="badge rounded-pill text-bg-secondary"><a href="/category={{ $post->category->slug }}" style="color: inherit; text-decoration: none;">{{ $post->category->name }}</a></span></p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 text-start">
                    <h6 class="fw-bold mb-4">Seri Laptop: <span class="fw-normal">{{ $post->seri_laptop }}</span></h6>
                    <h6 class="fw-bold mb-4">Processor: <span class="fw-normal">{{ $post->processor }}</span></h6>
                    <h6 class="fw-bold mb-4">Graphic Card: <span class="fw-normal">{{ $post->graphic_card }}</span></h6>
                    <h6 class="fw-bold mb-4">RAM: <span class="fw-normal">{{ $post->ram }}</span></h6>
                    <h6 class="fw-bold mb-4">Storage: <span class="fw-normal">{{ $post->storage }}</span></h6>
                    <h6 class="fw-bold mb-4">Port: <span class="fw-normal">{{ $post->port }}</span></h6>
                    <h6 class="fw-bold mb-4">OS: <span class="fw-normal">{{ $post->os }}</span></h6>
                    <h6 class="fw-bold mb-4">Price: <span class="fw-normal">Rp{{ number_format($post->price, 0, ',', '.') }}</span></h6>
                </div>
            </div>
            
        </article>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-dark text-light rounded-4 mt-5" href="/" style="text-decoration: none; color: inherit;"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        </div>
        
    </div>
</div>



@endsection