@extends('layouts.app')

@section('title', 'Guardanotas')

@section('content')
<div class="container text-center">
    <h6 class="text-uppercase text-primary">Salve suas ideias com notas online</h6>
    <h1 class="fw-bold">guardanotas ✍️</h1>

    <!-- Botão de Adicionar Nota -->
    <div class="mb-4 text-end">
        <a href="{{ route('task.create') }}" class="btn text-white" style="background-color: #6c63ff;">+ Adicionar Nota</a>
    </div>

    <!-- Filtro de Categoria -->
    <form action="{{ route('task.index') }}" method="GET" class="mb-4">
        <div class="mb-3">
            <select name="category_id" class="form-control text-white" style="background-color: #232323; border: none;">
                <option value="">Filtrar por Categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn text-white" style="background-color: #6c63ff;">Filtrar</button>
    </form>



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

</div>
@endsection
