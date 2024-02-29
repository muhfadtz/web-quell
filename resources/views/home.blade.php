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

@endsection
