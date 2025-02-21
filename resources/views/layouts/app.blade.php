<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Guardanotas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #181818;
            color: white;
            text-align: center;
        }
        .custom-input {
            background-color: #2b2b2b;
            border: 1px solid #3a3a3a;
            color: white;
        }
        .custom-input::placeholder {
            color: #777;
        }
        .custom-btn {
            background-color: #6c63ff;
            color: white;
            border: none;
        }
        .custom-btn:hover {
            background-color: #5a52e0;
        }
        .note-card {
            background-color: #232323 !important;
            border: none;
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        h2, .form-label {
        color: #b0b0b0; /* Cinza suave */
        text-align: left; /* Alinha à esquerda */
}

        .note-card:focus {
            background-color: #333 !important; /* Mantém a cor ao focar */
            color: white;
            border-color: #6c63ff; /* Realce na borda ao focar */
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5); /* Efeito sutil */
        }

    </style>
</head>
<body>
    <div class="container py-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
