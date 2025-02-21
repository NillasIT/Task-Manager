<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        }
        .custom-btn:hover {
            background-color: #5a52e0;
        }
        .char-counter {
            color: #777;
            font-size: 0.9rem;
        }
        .note-card {
            background-color: #333;
            border: 1px solid #444;
            color: white;
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
        
        <!-- Input de pesquisa e botão pesquisar -->
        <div class="d-flex align-items-center w-75 mb-3">
            <input type="text" id="noteInput" class="form-control custom-input p-2 me-2" placeholder="Escreva uma nova nota..." maxlength="200">
            <button class="btn btn-outline-light ms-2">Pesquisar</button>
        </div>

        <!-- Botão para abrir o modal -->
        <button class="btn custom-btn px-4 py-2 mb-4" data-bs-toggle="modal" data-bs-target="#addNoteModal">Adicionar Nota</button>

        <!-- Área onde as notas serão exibidas -->
        <div id="notesContainer" class="row w-75"></div>
    </div>

    <!-- Modal para Adicionar Nota -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="modalLabel">Nova Nota</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="noteForm">
                        <div class="mb-3">
                            <label for="noteTitle" class="form-label">Título</label>
                            <input type="text" class="form-control custom-input" id="noteTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="noteContent" class="form-label">Nota</label>
                            <textarea class="form-control custom-input" id="noteContent" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn custom-btn w-100">Salvar Nota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enviar os dados do formulário para a rota /store
        document.getElementById("noteForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            let title = document.getElementById("noteTitle").value;
            let content = document.getElementById("noteContent").value;

            fetch('/store', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title: title, content: content })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Nota salva com sucesso:", data);
                document.getElementById("noteForm").reset(); // Limpa o formulário
                let modal = new bootstrap.Modal(document.getElementById('addNoteModal'));
                modal.hide(); // Fecha o modal
                loadNotes(); // Atualiza a lista de notas
            })
            .catch(error => console.error("Erro ao salvar a nota:", error));
        });

        // Carregar as notas do banco de dados e exibir como cards
        function loadNotes() {
            fetch('/notes')
                .then(response => response.json())
                .then(notes => {
                    let notesContainer = document.getElementById("notesContainer");
                    notesContainer.innerHTML = ""; // Limpa os cards antes de adicionar novos
                    
                    notes.forEach(note => {
                        let noteCard = document.createElement("div");
                        noteCard.classList.add("col-md-4", "mb-3");
                        noteCard.innerHTML = `
                            <div class="card note-card p-3">
                                <h5>${note.title}</h5>
                                <p>${note.content}</p>
                            </div>
                        `;
                        notesContainer.appendChild(noteCard);
                    });
                })
                .catch(error => console.error("Erro ao carregar notas:", error));
        }

        // Carregar notas ao abrir a página
        document.addEventListener("DOMContentLoaded", loadNotes);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
