@extends('layouts.app')

@section('title', 'Criar Nota')

@section('content')
<div class="container" style="max-width: 600px; margin: auto;">
    <h2 class="mb-4 text-center text-primary">Editar Nota</h2>
    
    <form action="{{ route('task.update', ['task' => $task -> id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="noteTitle" class="form-label text-white">Título</label>
            <input type="text" name="title" id="noteTitle" 
                   class="form-control border-0 text-white" 
                   style="background-color: #232323;" required value="{{ old( 'title', $task -> title) }}">
        </div>
        <div class="mb-3">
            <label for="noteContent" class="form-label text-white">Nota</label>
            <textarea name="description" id="noteContent" 
                      class="form-control border-0 text-white" 
                      style="background-color: #232323;" rows="10">{{ old( 'description', $task -> description) }}</textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn text-white" style="background-color: #6c63ff;">Salvar Nota</button>
        </div>
    </form>
</div>
@endsection
