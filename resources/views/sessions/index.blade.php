@extends('layouts.app')

@section('title', 'Lista de Sessões')

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
    
    .filter-btn {
        padding: 8px 16px;
        border-radius: 20px;
        border: 2px solid #e0e0e0;
        background: white;
        color: #666;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s;
        margin-right: 8px;
        margin-bottom: 8px;
    }
    
    .filter-btn:hover {
        border-color: #667eea;
        color: #667eea;
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: transparent;
    }
    
    .session-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .session-table table {
        margin-bottom: 0;
    }
    
    .session-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .session-table thead th {
        border: none;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 12px;
    }
    
    .session-table tbody tr {
        border-bottom: 1px solid #f5f5f5;
        transition: background 0.2s;
    }
    
    .session-table tbody tr:hover {
        background: #f8f9ff;
    }
    
    .session-table tbody td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
        text-transform: uppercase;
    }
    
    .status-concluida {
        background: #d4edda;
        color: #155724;
    }
    
    .status-confirmada {
        background: #d1ecf1;
        color: #0c5460;
    }
    
    .status-pendente {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-cancelada {
        background: #f8d7da;
        color: #721c24;
    }
    
    .rating-badge {
        background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 12px;
    }
    
    .btn-avaliar-sm {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 11px;
        text-transform: uppercase;
        transition: transform 0.2s;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-avaliar-sm:hover {
        transform: scale(1.05);
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
    
    .btn-view {
        background: #667eea;
        color: white;
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
    
    .btn-action {
        border-radius: 20px;
        font-weight: 600;
        padding: 10px 25px;
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Sessões de Monitoria</h3>
        </div>
        <a href="{{ route('sessions.create') }}" class="btn btn-light btn-action">
            Nova Sessão
        </a>
    </div>
</div>

<div class="filters-bar">
    <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por monitor, aluno ou matéria...">
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap justify-content-md-end">
                <button class="filter-btn active" data-filter="all">📋 Todas</button>
                <button class="filter-btn" data-filter="concluida">✅ Concluídas</button>
                <button class="filter-btn" data-filter="confirmada">✔️ Confirmadas</button>
                <button class="filter-btn" data-filter="pendente">⏳ Pendentes</button>
                <button class="filter-btn" data-filter="cancelada">❌ Canceladas</button>
                <button class="filter-btn" data-filter="avaliada">⭐ Avaliadas</button>
                <button class="filter-btn" data-filter="pendavaliacao">📝 Pend. Avaliação</button>
            </div>
        </div>
    </div>
</div>

@if($sessions->count() > 0)
<div class="session-table">
    <table class="table" id="sessionsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Monitor</th>
                <th>Matéria</th>
                <th>Aluno</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Status</th>
                <th>Avaliação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            @php
                $temAvaliacao = isset($session->rating) && $session->rating !== null;
            @endphp
            <tr class="session-row" 
                data-status="{{ strtolower(trim($session->status)) }}" 
                data-avaliada="{{ $temAvaliacao ? 'sim' : 'nao' }}"
                data-search="{{ strtolower($session->monitor->name ?? '') }} {{ strtolower($session->aluno->name ?? '') }} {{ strtolower($session->monitor->subject->name ?? '') }}">
                <td><strong>#{{ $session->id }}</strong></td>
                <td>👨‍🏫 {{ $session->monitor->name ?? 'N/A' }}</td>
                <td>📖 {{ $session->monitor->subject->name ?? '-' }}</td>
                <td>👤 {{ $session->aluno->name ?? 'N/A' }}</td>
                <td>📅 {{ \Carbon\Carbon::parse($session->data)->format('d/m/Y') }}</td>
                <td>⏰ {{ substr($session->hora_inicio, 0, 5) }} - {{ substr($session->hora_fim, 0, 5) }}</td>
                <td>
                    @if(strtolower($session->status) === 'concluida')
                        <span class="status-badge status-concluida">✓ Concluída</span>
                    @elseif(strtolower($session->status) === 'confirmada')
                        <span class="status-badge status-confirmada">✔️ Confirmada</span>
                    @elseif(strtolower($session->status) === 'pendente')
                        <span class="status-badge status-pendente">⏳ Pendente</span>
                    @elseif(strtolower($session->status) === 'cancelada')
                        <span class="status-badge status-cancelada">❌ Cancelada</span>
                    @else
                        <span class="status-badge">{{ $session->status }}</span>
                    @endif
                </td>
                <td>
                    @if($temAvaliacao)
                        <span class="rating-badge">⭐ {{ $session->rating->rate }}/5</span>
                    @elseif(strtolower($session->status) === 'concluida')
                        <a href="{{ route('ratings.create', $session->id) }}" class="btn-avaliar-sm">
                            Avaliar
                        </a>
                    @else
                        <span class="text-muted" style="font-size: 12px;">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('sessions.show', $session->id) }}" class="action-btn-sm btn-view" title="Ver">👁️</a>
                    <a href="{{ route('sessions.edit', $session->id) }}" class="action-btn-sm btn-edit" title="Editar">✏️</a>
                    <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Confirma exclusão?')">
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
    <h5>Nenhuma sessão encontrada</h5>
    <p class="text-muted">Tente ajustar os filtros ou busca</p>
</div>

<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary btn-action">
        ← Voltar
    </a>
</div>

@else
<div class="card" style="border-radius: 12px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="card-body empty-state">
        <div style="font-size: 80px; margin-bottom: 20px;">📭</div>
        <h4>Nenhuma sessão cadastrada</h4>
        <p class="text-muted mb-4">Comece criando sua primeira sessão!</p>
        <a href="{{ route('sessions.create') }}" class="btn btn-primary btn-action">
            ➕ Criar Sessão
        </a>
    </div>
</div>

<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary btn-action">
        ← Voltar
    </a>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const rows = document.querySelectorAll('.session-row');
    const noResults = document.getElementById('noResults');
    const table = document.getElementById('sessionsTable');
    
    let currentFilter = 'all';
    let currentSearch = '';
    
    console.log('Linhas carregadas:');
    rows.forEach((row, index) => {
        console.log(`Linha ${index}: status="${row.dataset.status}", avaliada="${row.dataset.avaliada}"`);
    });
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.dataset.filter;
            console.log('Filtro ativo:', currentFilter);
            applyFilters();
        });
    });
    
    searchInput.addEventListener('input', function() {
        currentSearch = this.value.toLowerCase().trim();
        applyFilters();
    });
    
    function applyFilters() {
        let visibleCount = 0;
        
        rows.forEach(row => {
            let showByFilter = false;
            let showBySearch = false;
            
            const rowStatus = row.dataset.status.toLowerCase().trim();
            const rowAvaliada = row.dataset.avaliada;
            
            if (currentFilter === 'all') {
                showByFilter = true;
            } else if (currentFilter === 'avaliada') {
                showByFilter = rowAvaliada === 'sim';
            } else if (currentFilter === 'pendavaliacao') {
                showByFilter = rowStatus === 'concluida' && rowAvaliada === 'nao';
            } else {
                showByFilter = rowStatus === currentFilter;
            }
            
            if (currentSearch === '') {
                showBySearch = true;
            } else {
                showBySearch = row.dataset.search.includes(currentSearch);
            }
            
            if (showByFilter && showBySearch) {
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
        
        console.log(`Filtros aplicados: ${visibleCount} linhas visíveis`);
    }
});
</script>

@endsection