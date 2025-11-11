@extends('layouts.app')

@section('title', 'Matérias')

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
    
    .filters-bar {
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .subjects-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .subjects-table table {
        margin-bottom: 0;
    }
    
    .subjects-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .subjects-table thead th {
        border: none;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 12px;
    }
    
    .subjects-table tbody tr {
        border-bottom: 1px solid #f5f5f5;
        transition: background 0.2s;
    }
    
    .subjects-table tbody tr:hover {
        background: #f8f9ff;
    }
    
    .subjects-table tbody td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .monitor-count-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .action-btn-sm {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        border: none;
        margin: 0 2px;
        transition: transform 0.2s;
    }
    
    .action-btn-sm:hover {
        transform: scale(1.1);
    }
    
    .btn-edit {
        background: #f093fb;
        color: white;
    }
    
    .btn-delete {
        background: #fa709a;
        color: white;
    }
    
    .search-box {
        position: relative;
    }
    
    .search-box input {
        border-radius: 20px;
        padding-left: 40px;
        border: 2px solid #e0e0e0;
    }
    
    .search-box input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }
    
    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }
    
    .alert {
        border-radius: 12px;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Matérias</h3>
        </div>
        <a href="{{ route('subjects.create') }}" class="btn btn-light" style="border-radius: 20px; font-weight: 600;">
            Nova Matéria
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✅ Sucesso!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>❌ Erro!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="filters-bar">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nome ou descrição...">
            </div>
        </div>
    </div>
</div>

@if($subjects->count() > 0)
<div class="subjects-table">
    <table class="table" id="subjectsTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Nº Monitores</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr class="subject-row" 
                data-search="{{ strtolower($subject->name) }} {{ strtolower($subject->description ?? '') }}">
                <td>📖 <strong>{{ $subject->name }}</strong></td>
                <td>
                    @if($subject->description)
                        {{ Str::limit($subject->description, 80) }}
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    @php
                        $monitorText = $subject->monitores_count == 1 ? 'monitor' : 'monitores';
                    @endphp
                    <span class="monitor-count-badge">
                        👨‍🏫 {{ $subject->monitores_count }} {{ $monitorText }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="action-btn-sm btn-edit" title="Editar">✏️</a>
                    @php
                        $confirmMsg = 'Tem certeza que deseja excluir esta matéria?';
                        if ($subject->monitores_count > 0) {
                            $confirmMsg .= ' Atenção: Esta matéria possui ' . $subject->monitores_count . ' monitor(es) vinculado(s)!';
                        }
                    @endphp
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('{{ $confirmMsg }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn-sm btn-delete" title="Excluir">🗑️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="empty-state" id="noResults" style="display: none;">
    <div style="font-size: 60px; margin-bottom: 15px;">🔍</div>
    <h5>Nenhuma matéria encontrada</h5>
    <p class="text-muted">Tente ajustar a busca</p>
</div>

@else
<div class="card" style="border-radius: 12px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="card-body empty-state">
        <div style="font-size: 80px; margin-bottom: 20px;">📚</div>
        <h4>Nenhuma matéria cadastrada</h4>
        <p class="text-muted mb-4">Comece adicionando a primeira matéria!</p>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary" style="border-radius: 20px; padding: 10px 25px;">
            ➕ Nova Matéria
        </a>
    </div>
</div>
@endif

<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary" style="border-radius: 20px; font-weight: 600;">
        ← Voltar
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.subject-row');
    const noResults = document.getElementById('noResults');
    const table = document.getElementById('subjectsTable');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            rows.forEach(row => {
                const searchData = row.dataset.search;
                
                if (searchTerm === '' || searchData.includes(searchTerm)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            if (visibleCount === 0) {
                table.style.display = 'none';
                noResults.style.display = 'block';
            } else {
                table.style.display = 'table';
                noResults.style.display = 'none';
            }
        });
    }
});
</script>

@endsection