@extends('layouts.main')

@section('container')
<h1>Select Posts to Compare</h1>

<form action="{{ route('compare') }}" method="GET">
    <div class="form-group">
        @foreach($posts as $post)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="posts[]" value="{{ $post->slug }}">
                    {{ $post->title }} - {{ $post->category->name }}
                </label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Compare</button>
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
