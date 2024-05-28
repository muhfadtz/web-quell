<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Laptop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-bottom: 70px; /* Membuat ruang di bagian bawah untuk form input */
        }
        .chat-container {
            padding: 10px;
            overflow-y: auto;
            max-height: calc(100vh - 150px); /* Tinggi maksimal chat container */
        }
        .message {
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .user-message {
            background-color: #d1e7dd;
        }
        .bot-message {
            background-color: #f8d7da;
        }
        .form-container {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0px -2px 4px rgba(0, 0, 0, 0.1); /* Menambah bayangan di bagian bawah */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="chat-container" id="chat-container">
                    <!-- Chat messages will be appended here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Form input tetap di bawah -->
    <div class="form-container">
        <form id="chat-form">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Deskripsi kebutuhan laptop Anda"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('chat-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const description = document.getElementById('description').value;
            if (description.trim() === '') {
                return;
            }

            // Append user message
            appendMessage(description, 'user-message');

            try {
                const response = await fetch('{{ url('/recommend') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ description })
                });

                const result = await response.json();
                let botMessage = '';

                if (result.length > 0) {
                    botMessage = result.map(laptop => `
                        <div class="message bot-message">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nama Laptop: ${laptop['Nama Laptop']}</h5>
                                    <p class="card-text">Processor: ${laptop['Processor']}</p>
                                    <p class="card-text">Graphic Card: ${laptop['Graphic Card']}</p>
                                    <p class="card-text">RAM: ${laptop['RAM']}</p>
                                    <p class="card-text">OS: ${laptop['OS']}</p>
                                    <p class="card-text">Harga: ${laptop['Harga']}</p>
                                    <p class="card-text">Panel layar: ${laptop['Panel layar']}</p>
                                    <p class="card-text">Refresh rate: ${laptop['Refresh rate']}</p>
                                    <p class="card-text">Berat: ${laptop['Heavy']} Kg</p>
                                </div>
                            </div>
                        </div>
                    `).join('');
                } else {
                    botMessage = '<div class="message bot-message">Maaf, tidak ditemukan laptop yang sesuai dengan deskripsi Anda.</div>';
                }

                // Append bot message
                document.getElementById('chat-container').innerHTML += botMessage;
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('chat-container').innerHTML += '<div class="message bot-message">Terjadi kesalahan saat mendapatkan rekomendasi.</div>';
            }

            document.getElementById('description').value = '';
        });

        function appendMessage(message, className) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', className);
            messageElement.innerHTML = message;
            document.getElementById('chat-container').appendChild(messageElement);
            messageElement.scrollIntoView();
        }
    </script>
</body>
</html>
