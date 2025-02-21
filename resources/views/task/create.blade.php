@extends('layouts.app')

@section('title', 'Criar Nota')

@section('content')
<div class="container">
    <h2 class="mb-4">Criar Nova Nota</h2>
    
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="noteTitle" class="form-label">Título</label>
            <input type="text" name="title" id="noteTitle" class="form-control note-card" required>
        </div>
        <div class="mb-3">
            <label for="noteContent" class="form-label">Nota</label>
            <textarea name="description" id="noteContent" class="form-control note-card" rows="4"></textarea>
        </div>
        <button type="submit" class="btn custom-btn">Salvar Nota</button>
    </form>
</div>
@endsection
