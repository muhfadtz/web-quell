@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8 p-3">
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
                <div class="form-text">Note: If the slug is deleted, please re-enter your title.</div>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image <small class="text-danger">*Image not required</small></label>
                <img class="img-preview img-fluid mb-3 col-md-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                <div class="form-text">Note: Upload image file Max: 2Mb</div>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="seri_laptop" class="form-label">Seri Laptop</label>
                <input type="text" class="form-control @error('seri_laptop') is-invalid @enderror" id="seri_laptop" name="seri_laptop" required autofocus value="{{ old('seri_laptop') }}">
                @error('seri_laptop')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="processor" class="form-label">Processor</label>
                <input type="text" class="form-control @error('processor') is-invalid @enderror" id="processor" name="processor" required autofocus value="{{ old('processor') }}">
                @error('processor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="graphic_card" class="form-label">Graphic Card</label>
                <input type="text" class="form-control @error('graphic_card') is-invalid @enderror" id="graphic_card" name="graphic_card" required autofocus value="{{ old('graphic_card') }}">
                @error('graphic_card')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ram" class="form-label">RAM</label>
                <input type="text" class="form-control @error('ram') is-invalid @enderror" id="ram" name="ram" required autofocus value="{{ old('ram') }}">
                @error('ram')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="storage" class="form-label">Storage</label>
                <input type="text" class="form-control @error('storage') is-invalid @enderror" id="storage" name="storage" required autofocus value="{{ old('storage') }}">
                @error('storage')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="port" class="form-label">Port</label>
                <input type="text" class="form-control @error('port') is-invalid @enderror" id="port" name="port" required autofocus value="{{ old('port') }}">
                @error('port')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="os" class="form-label">Operating System</label>
                <input type="text" class="form-control @error('os') is-invalid @enderror" id="os" name="os" required autofocus value="{{ old('os') }}">
                @error('os')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required autofocus value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('input', function() {
            const slugValue = title.value
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
            slug.value = slugValue;
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection

