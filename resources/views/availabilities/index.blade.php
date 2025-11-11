@extends('layouts.app')

@section('title', 'Disponibilidades dos Monitores')

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
    
    .availability-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .availability-table table {
        margin-bottom: 0;
    }
    
    .availability-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .availability-table thead th {
        border: none;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 12px;
    }
    
    .availability-table tbody tr {
        border-bottom: 1px solid #f5f5f5;
        transition: background 0.2s;
    }
    
    .availability-table tbody tr:hover {
        background: #f8f9ff;
    }
    
    .availability-table tbody td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .day-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
        text-transform: uppercase;
    }
    
    .day-segunda { background: #e3f2fd; color: #1565c0; }
    .day-terca { background: #f3e5f5; color: #6a1b9a; }
    .day-quarta { background: #e8f5e9; color: #2e7d32; }
    .day-quinta { background: #fff3e0; color: #e65100; }
    .day-sexta { background: #fce4ec; color: #c2185b; }
    .day-sabado { background: #e0f2f1; color: #00695c; }
    .day-domingo { background: #ffebee; color: #c62828; }
    
    .duration-badge {
        background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 12px;
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
            <h3 class="mb-0">Disponibilidades dos Monitores</h3>
        </div>
        <a href="{{ route('availabilities.create') }}" class="btn btn-light" style="border-radius: 20px; font-weight: 600;">
            Nova Disponibilidade
        </a>
    </div>
</div>

<div class="filters-bar">
    <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por monitor, matéria ou dia...">
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap justify-content-md-end">
                <button class="filter-btn active" data-filter="all">📋 Todos</button>
                <button class="filter-btn" data-filter="segunda">Segunda</button>
                <button class="filter-btn" data-filter="terça">Terça</button>
                <button class="filter-btn" data-filter="quarta">Quarta</button>
                <button class="filter-btn" data-filter="quinta">Quinta</button>
                <button class="filter-btn" data-filter="sexta">Sexta</button>
            </div>
        </div>
    </div>
</div>

@if($availabilities->count() > 0)
<div class="availability-table">
    <table class="table" id="availabilitiesTable">
        <thead>
            <tr>
                <th>Monitor</th>
                <th>Matéria</th>
                <th>Dia da Semana</th>
                <th>Horário</th>
                <th>Duração</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($availabilities as $availability)
            @php
                $diasSemana = \App\Models\Availability::diasSemana();
                $diaNomeCompleto = $diasSemana[$availability->dia_semana];
                $diaNomeLower = strtolower($diaNomeCompleto);
                
                $diasMap = [
                    'segunda-feira' => 'day-segunda',
                    'terça-feira' => 'day-terca',
                    'quarta-feira' => 'day-quarta',
                    'quinta-feira' => 'day-quinta',
                    'sexta-feira' => 'day-sexta',
                    'sábado' => 'day-sabado',
                    'domingo' => 'day-domingo',
                ];
                $diaClass = $diasMap[$diaNomeLower] ?? 'day-segunda';
                
                // Remove "-feira" para o filtro
                $diaFiltro = str_replace('-feira', '', $diaNomeLower);
                
                $duracao = \Carbon\Carbon::parse($availability->hora_inicio)->diffInHours(\Carbon\Carbon::parse($availability->hora_fim));
            @endphp
            <tr class="availability-row" 
                data-dia="{{ $diaFiltro }}"
                data-search="{{ strtolower($availability->monitor->name ?? '') }} {{ strtolower($availability->monitor->subject->name ?? '') }} {{ $diaNomeLower }}">
                <td>👨‍🏫 {{ $availability->monitor->name ?? 'N/A' }}</td>
                <td>📖 {{ $availability->monitor->subject->name ?? '-' }}</td>
                <td>
                    <span class="day-badge {{ $diaClass }}">
                        {{ $diaNomeCompleto }}
                    </span>
                </td>
                <td>⏰ {{ \Carbon\Carbon::parse($availability->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($availability->hora_fim)->format('H:i') }}</td>
                <td>
                    <span class="duration-badge">⌛ {{ $duracao }}h</span>
                </td>
                <td>
                    <a href="{{ route('availabilities.edit', $availability->id) }}" class="action-btn-sm btn-edit" title="Editar">✏️</a>
                    <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
    <h5>Nenhuma disponibilidade encontrada</h5>
    <p class="text-muted">Tente ajustar os filtros ou busca</p>
</div>

@else
<div class="card" style="border-radius: 12px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="card-body empty-state">
        <div style="font-size: 80px; margin-bottom: 20px;">📭</div>
        <h4>Nenhuma disponibilidade cadastrada</h4>
        <p class="text-muted mb-4">Comece criando a primeira disponibilidade!</p>
        <a href="{{ route('availabilities.create') }}" class="btn btn-primary" style="border-radius: 20px; padding: 10px 25px;">
            ➕ Criar Disponibilidade
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
    const rows = document.querySelectorAll('.availability-row');
    const noResults = document.getElementById('noResults');
    const table = document.getElementById('availabilitiesTable');
    
    let currentFilter = 'all';
    let currentSearch = '';
    
    console.log('Linhas carregadas:');
    rows.forEach((row, index) => {
        console.log(`Linha ${index}: dia="${row.dataset.dia}"`);
    });
    
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
            
            const rowDia = row.dataset.dia;

            if (currentFilter === 'all') {
                showByFilter = true;
            } else {
                showByFilter = rowDia === currentFilter;
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