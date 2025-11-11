@extends('layouts.app')

@section('title', 'Nova Matéria')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    
    .form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        padding: 10px 15px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }
    
    .alert {
        border-radius: 12px;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .btn-action {
        border-radius: 20px;
        font-weight: 600;
        padding: 10px 25px;
    }
</style>

<div class="page-header">
    <h3 class="mb-0">📚 Nova Matéria</h3>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>❌ Ops! Alguns erros foram encontrados:</strong>
    <ul class="mb-0 mt-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-card">
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">📖 Nome da Matéria</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name') }}" placeholder="Ex: Matemática" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">📝 Descrição (Opcional)</label>
            <textarea name="description" id="description" class="form-control" 
                      rows="4" placeholder="Descreva a matéria...">{{ old('description') }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary btn-action">💾 Salvar</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary btn-action">← Voltar</a>
        </div>
    </form>
</div>

@endsection