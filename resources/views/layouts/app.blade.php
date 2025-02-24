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

        /* Botão Adicionar */
        .btn-add {
            color: #6c63ff;
            font-size: 24px;
            border: none;
            background: none;
        }
        .btn-add:hover {
            color: #5a52e0;
        }

        /* Cards */
        .note-card {
            background-color: #232323 !important;
            border: none;
            color: white;
            padding: 15px;
            border-radius: 10px;
            width: 360px;
            min-height: 240px; /* Definindo altura mínima */
            display: flex;
            flex-direction: column; /* Usar flexbox para layout */
            justify-content: space-between;
        }

        /* Título */
        .note-card .note-title {
            font-weight: bold;
            margin: 0;
            text-align: start;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            word-wrap: break-word; /* Garante que o título quebre em palavras longas */
        }

        /* Descrição */
        .note-card .note-description {
            flex-grow: 1;
            text-align: start;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 7; /* Limita a 7 linhas */
            -webkit-box-orient: vertical;
            margin: 0;
        }

        /* Botões de Ação */
        .note-actions {
            display: flex;
            justify-content: end;
            gap: 5px;
            margin-top: 10px;
        }

        .btn-action {
            border: none;
            color: white;
            font-size: 14px;
            padding: 5px 8px;
        }
        .btn-action:hover {
            opacity: 0.8;
        }

        /* Estilização do modal */
        .modal-dialog {
            max-width: 60%; /* Aumentado para 1.5x do tamanho padrão */
        }

        .pagination {
    background-color: transparent;  /* Fundo transparente */
    border: none;
    margin: 0;
}

.pagination .page-item {
    background-color: transparent;  /* Itens da navegação com fundo transparente */
    border: none;
}

.pagination .page-link {
    color: white;  /* Cor do texto */
    font-size: 14px;
    padding: 8px 12px;
}

.pagination .page-item.active .page-link {
    color: #6c63ff; /* Cor do número da página ativa */
}

.pagination .page-item.disabled .page-link {
    color: #777; /* Cor para páginas desabilitadas */
}

.pagination .page-link:hover {
    color: #6c63ff; /* Cor ao passar o mouse sobre o número da página */
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
