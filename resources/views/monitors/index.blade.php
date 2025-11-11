@extends('layouts.app')

@section('title', 'Monitores')

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
    
    .monitors-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .monitors-table table {
        margin-bottom: 0;
    }
    
    .monitors-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .monitors-table thead th {
        border: none;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 12px;
    }
    
    .monitors-table tbody tr {
        border-bottom: 1px solid #f5f5f5;
        transition: background 0.2s;
    }
    
    .monitors-table tbody tr:hover {
        background: #f8f9ff;
    }
    
    .monitors-table tbody td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .subject-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Monitores</h3>
        </div>
        <a href="{{ route('monitors.create') }}" class="btn btn-light" style="border-radius: 20px; font-weight: 600;">
            Adicionar Monitor
        </a>
    </div>
</div>

<div class="filters-bar">
    <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nome, email ou matéria...">
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap justify-content-md-end">
                <button class="filter-btn active" data-filter="all">📋 Todos</button>
                @foreach($monitors->pluck('subject')->unique('id')->sortBy('name') as $subject)
                    @if($subject)
                        <button class="filter-btn" data-filter="{{ $subject->id }}">{{ $subject->name }}</button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@if($monitors->count() > 0)
<div class="monitors-table">
    <table class="table" id="monitorsTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Matéria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($monitors as $monitor)
            <tr class="monitor-row" 
                data-subject="{{ $monitor->subject->id ?? '' }}"
                data-search="{{ strtolower($monitor->name) }} {{ strtolower($monitor->email) }} {{ strtolower($monitor->subject->name ?? '') }}">
                <td>👤 {{ $monitor->name }}</td>
                <td>📧 {{ $monitor->email }}</td>
                <td>
                    @if($monitor->subject)
                        <span class="subject-badge">📖 {{ $monitor->subject->name }}</span>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('monitors.edit', $monitor->id) }}" class="action-btn-sm btn-edit" title="Editar">✏️</a>
                    <form action="{{ route('monitors.destroy', $monitor->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Tem certeza que deseja excluir este monitor?')">
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
    <h5>Nenhum monitor encontrado</h5>
    <p class="text-muted">Tente ajustar os filtros ou busca</p>
</div>

@else
<div class="card" style="border-radius: 12px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="card-body empty-state">
        <div style="font-size: 80px; margin-bottom: 20px;">👨‍🏫</div>
        <h4>Nenhum monitor cadastrado</h4>
        <p class="text-muted mb-4">Comece adicionando o primeiro monitor!</p>
        <a href="{{ route('monitors.create') }}" class="btn btn-primary" style="border-radius: 20px; padding: 10px 25px;">
            ➕ Adicionar Monitor
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
    const filterBtns = document.querySelectorAll('.filter-btn');
    const rows = document.querySelectorAll('.monitor-row');
    const noResults = document.getElementById('noResults');
    const table = document.getElementById('monitorsTable');
    
    let currentFilter = 'all';
    let currentSearch = '';
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.dataset.filter;
            applyFilters();
        });
    });
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            currentSearch = this.value.toLowerCase().trim();
            applyFilters();
        });
    }
    
    function applyFilters() {
        let visibleCount = 0;
        
        rows.forEach(row => {
            let showByFilter = false;
            let showBySearch = false;
            
            const rowSubject = row.dataset.subject;
            
            if (currentFilter === 'all') {
                showByFilter = true;
            } else {
                showByFilter = rowSubject === currentFilter;
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
    }
});
</script>

@endsection