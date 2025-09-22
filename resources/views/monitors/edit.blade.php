@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Monitor</h1>

    <form action="{{ route('monitors.update', $monitor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $monitor->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $monitor->email }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha (deixe em branco para não alterar)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme a Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label for="subject_id" class="form-label">Matéria</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                <option value="">Selecione a matéria</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $monitor->subject_id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('monitors.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
