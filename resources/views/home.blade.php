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
                    <h4>QuellBot</h4>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="tab-container mb-5">
                    <div class="tab-bar ms-4">
                      @foreach($categories as $category)
                          <div class="tab @if(request('category') == $category->slug) active @endif" data-category="{{ $category->name }}">
                              <a href="/blog?category={{ $category->slug }}" style="color: inherit; text-decoration: none;">{{ $category->name }}</a>
                          </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-lg-3 mb-5">
                    <div class="row">
                        <div class="col-12">
                            @if ($post->image)
                                <img class="img-fluid rounded-4" style="height: auto; max-height: 140px; width: 100%;" src="{{ asset('storage/' . $post->image) }}" alt="image">
                            @else
                                <img class="img-fluid rounded-4" src="https:/source.unsplash.com/1280x720/?{{ $post->category->name }}" alt="image">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-2"><a href="{{ route('posts.show', ['slug' => $post->slug]) }}" style="color: inherit; text-decoration: none;">{{ $post->title }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
    
            tabs.forEach(tab => {
                tab.addEventListener('click', function(event) {
                    event.preventDefault(); // Mencegah perilaku default anchor link
    
                    // Lakukan navigasi ke URL
                    window.location.href = this.querySelector('a').getAttribute('href');
                });
            });
        });
    </script>
@endsection
