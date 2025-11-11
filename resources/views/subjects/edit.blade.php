@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Matéria</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $subject->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $subject->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection