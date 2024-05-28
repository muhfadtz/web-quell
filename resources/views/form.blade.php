<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Laptop</title>
</head>
<body>
    <h1>Masukkan Deskripsi Kebutuhan Laptop Anda</h1>
    <form action="{{ url('/recommend') }}" method="POST">
        @csrf
        <textarea name="description" rows="4" cols="50" placeholder="Deskripsi kebutuhan laptop Anda"></textarea><br><br>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
