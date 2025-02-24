@extends('layouts.app')

@section('title', 'Guardanotas')

@section('content')
<div class="container text-center">
    <h6 class="text-uppercase text-primary">Salve suas ideias com notas online</h6>
    <h1 class="fw-bold">guardanotas ✍️</h1>

    <!-- Botão de Adicionar -->
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('task.create') }}" class="text-primary fs-2 text-decoration-none">+</a>
    </div>

    <!-- Cards das Notas -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($tasks as $task)
            <div class="col d-flex justify-content-center">
                <div class="note-card p-3 rounded d-flex flex-column justify-content-between h-100">
                    <!-- Título -->
                    <p class="note-title">{{ $task->title }}</p>
                    <!-- Descrição -->
                    <p class="note-description">{{ $task->description }}</p>

                    <!-- Botões no canto inferior direito -->
                    <div class="d-flex justify-content-end note-actions">
                        <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="btn btn-sm text-white px-2" style="background: none;">✏️</a>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm text-white px-2" style="background: none;">🗑️</button>
                        </form>
                        <!-- Botão de Olho para abrir o modal -->
                        <button class="btn btn-sm text-white px-2" style="background: none;" data-bs-toggle="modal" data-bs-target="#viewNote{{ $task->id }}">👁️</button>
                    </div>
                </div>
            </div>

            <!-- Modal de Visualização -->
            <div class="modal fade" id="viewNote{{ $task->id }}" tabindex="-1" aria-labelledby="viewNoteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 50vw;">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">{{ $task->title }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $task->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navegação de Páginas com apenas números -->
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" style="background-color: transparent; border: none;">
                @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                    <li class="page-item {{ ($tasks->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $tasks->url($i) }}" style="color: white; font-size: 14px;">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>

    <!-- Rodapé -->
    <footer class="mt-5 text-muted small">
        Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing elit.
        <strong>Curabitur</strong> ac quam vel odio auctor molestie. Vestibulum at urna id lacus viverra accumsan.
    </footer>
</div>
@endsection
