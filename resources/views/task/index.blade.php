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
        @forelse($tasks as $task)
            <div class="col d-flex justify-content-center">
                <div class="note-card p-3 rounded d-flex flex-column justify-content-between h-100" style="width: 300px; height: 300px;">
                    <div class="flex-grow-1">
                        <p class="fw-bold text-start m-0">{{ $task->title }}</p>
                        <p class="small text-start overflow-hidden" style="max-height: 200px; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 8; -webkit-box-orient: vertical;">{{ $task->description }}</p>
                    </div>

                    <!-- Botões no canto inferior direito -->
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-sm text-white px-2" style="background: none;">✏️</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm text-white px-2" style="background: none;">🗑️</button>
                        </form>
                        <button class="btn btn-sm text-white px-2" style="background: none;" data-bs-toggle="modal" data-bs-target="#viewNote{{ $task->id }}">👁️</button>
                    </div>
                </div>
            </div>

            <!-- Modal de Visualização -->
            <div class="modal fade" id="viewNote{{ $task->id }}" tabindex="-1" aria-labelledby="viewNoteLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
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
        @empty
            <p class="text-center text-muted">Nenhuma nota cadastrada ainda.</p>
        @endforelse
    </div>

    <!-- Rodapé -->
    <footer class="mt-5 text-muted small">
        Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing elit. <strong>Curabitur</strong> ac quam vel odio auctor molestie. Vestibulum at urna id lacus viverra accumsan.
    </footer>
</div>
@endsection
