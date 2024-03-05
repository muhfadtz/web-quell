@extends('.dashboard.layouts.main')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <article>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <h3>{{ $posts->title }}</h3>
                    <p><span class="badge rounded-pill text-bg-secondary"><a href="/blog?category={{ $posts->category->slug }}" style="color: inherit; text-decoration: none;">{{ $posts->category->name }}</a></span></p>
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col-12 text-start">
                    <a href="/dashboard/posts" class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i> Back</a>&nbsp;
                    <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>&nbsp;
                    <form action="/dashboard/posts/{{ $posts->slug }}" method="post" class="d-inline">
                        @method( 'delete' )
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa-solid fa-trash" style="color: #000;"></i> Delete</button>
                      </form>
                </div>
            </div>
            @if ($posts->image)
            <div class="row mb-4">
                <div class="col-md 12">
                    <img class="img-fluid" src="{{ asset('storage/' . $posts->image) }}" alt="image" style="height: 400px; width: 1200px; overflow:hidden;">
                </div>
            </div>
            @else
            <div class="row mb-4">
                <div class="col-md 12">
                    <img class="img-fluid" src="https:/source.unsplash.com/1200x400/?{{ $posts->category->name }}" alt="image">
                </div>
            </div>
            @endif
            
            <div class="row mb-5">
                <div class="col-md-12">
                    {!! $posts->body !!}
                </div>  
            </div>
            
        </article>
    </div>
    <div class="col-md-3">

    </div>
</div>
@endsection