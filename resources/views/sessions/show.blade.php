@extends('layouts.app')

@section('title', 'Detalhes da Sessão')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $session->id }}</li>
    <li class="list-group-item"><strong>Monitor:</strong> {{ $session->monitor->name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Aluno:</strong> {{ $session->aluno->name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Data:</strong> {{ $session->data }}</li>
    <li class="list-group-item"><strong>Hora Início:</strong> {{ $session->hora_inicio }}</li>
    <li class="list-group-item"><strong>Hora Fim:</strong> {{ $session->hora_fim }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $session->status }}</li>
</ul>
<a href="{{ route('sessions.index') }}" class="btn btn-primary mt-3">Voltar</a>
@endsection
