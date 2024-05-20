@extends('layouts.main')

@section('container')
<h2 style="font-family: Arial, sans-serif; color: #333; text-align: center; margin-bottom: 20px;">Select laptop to Compare</h2>

<form action="{{ route('compare') }}" method="GET" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
    <div class="form-group" style="margin-bottom: 15px;">
        @foreach($posts as $post)
            <div class="checkbox" style="margin-bottom: 10px;">
                <label style="display: flex; align-items: center;">
                    <input type="checkbox" name="posts[]" value="{{ $post->slug }}" style="margin-right: 10px;">
                    <span style="font-family: Arial, sans-serif; color: #555;">{{ $post->title }} - <span style="font-weight: bold;">{{ $post->category->name }}</span></span>
                </label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary" style="display: block; width: 100%; padding: 10px; background-color: #007bff; border: none; border-radius: 5px; color: white; font-size: 16px; cursor: pointer;">Compare</button>
</form>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var checkBoxes = document.querySelectorAll('input[type="checkbox"][name="posts[]"]');
    checkBoxes.forEach(function(check) {
        check.onclick = function() {
            let checkedCount = document.querySelectorAll('input[type="checkbox"][name="posts[]"]:checked').length;
            if (checkedCount > 2) {
                this.checked = false;
                alert('You can only compare 2 posts at a time.');
            }
        }
    });
});
</script>
@endsection
