<!DOCTYPE html>
<html>
<head>
    <title>Recommended Laptops</title>
</head>
<body>
    <h1>Recommended Laptops</h1>
    @if (!empty($laptops))
        <table>
            <thead>
                <tr>
                    <th>Nama Laptop</th>
                    <th>Processor</th>
                    <th>Graphic Card</th>
                    <th>RAM</th>
                    <th>OS</th>
                    <th>Harga</th>
                    <th>Panel layar</th>
                    <th>Refresh rate</th>
                    <th>Heavy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laptops as $laptop)
                    <tr>
                        <td>{{ $laptop['Nama Laptop'] }}</td>
                        <td>{{ $laptop['Processor'] }}</td>
                        <td>{{ $laptop['Graphic Card'] }}</td>
                        <td>{{ $laptop['RAM'] }}</td>
                        <td>{{ $laptop['OS'] }}</td>
                        <td>{{ $laptop['Harga'] }}</td>
                        <td>{{ $laptop['Panel layar'] }}</td>
                        <td>{{ $laptop['Refresh rate'] }}</td>
                        <td>{{ $laptop['Heavy'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Maaf, tidak ditemukan laptop yang sesuai dengan deskripsi Anda.</p>
    @endif
</body>
</html>
