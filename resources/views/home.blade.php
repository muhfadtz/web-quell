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
    </div>

@endsection
