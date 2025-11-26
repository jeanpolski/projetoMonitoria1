@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('styles')
<style>
    .availabilities-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 32px 24px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .btn-add {
        background: #3b82f6;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-add:hover {
        background: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        color: white;
    }

    .filters-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        border: 1px solid #e2e8f0;
    }

    .search-box {
        position: relative;
        margin-bottom: 20px;
    }

    .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        width: 20px;
        height: 20px;
    }

    .search-input {
        width: 100%;
        padding: 14px 16px 14px 48px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.2s;
    }

    .search-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .filter-btn {
        padding: 10px 20px;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        background: white;
        color: #64748b;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .filter-btn:hover {
        border-color: #cbd5e1;
        background: #f8fafc;
        color: #334155;
    }

    .filter-btn.active {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }

    .availabilities-table-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        border: 1px solid #e2e8f0;
        margin-bottom: 24px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .availabilities-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .availabilities-table thead {
        background: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
    }

    .availabilities-table thead th {
        padding: 16px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }

    .availabilities-table tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.15s;
    }

    .availabilities-table tbody tr:hover {
        background: #f8fafc;
    }

    .availabilities-table tbody tr:last-child {
        border-bottom: none;
    }

    .availabilities-table tbody td {
        padding: 16px 20px;
        font-size: 15px;
        color: #334155;
        vertical-align: middle;
    }

    .day-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid;
    }

    .day-segunda {
        background: #dbeafe;
        color: #1e40af;
        border-color: #bfdbfe;
    }

    .day-terca {
        background: #e9d5ff;
        color: #6b21a8;
        border-color: #ddd6fe;
    }

    .day-quarta {
        background: #dcfce7;
        color: #15803d;
        border-color: #bbf7d0;
    }

    .day-quinta {
        background: #fed7aa;
        color: #c2410c;
        border-color: #fdba74;
    }

    .day-sexta {
        background: #fce7f3;
        color: #be185d;
        border-color: #fbcfe8;
    }

    .day-sabado {
        background: #ccfbf1;
        color: #0f766e;
        border-color: #99f6e4;
    }

    .day-domingo {
        background: #fee2e2;
        color: #b91c1c;
        border-color: #fecaca;
    }

    .subject-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #dbeafe;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    .btn-edit {
        background: #eff6ff;
        color: #3b82f6;
    }

    .btn-edit:hover {
        background: #dbeafe;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
    }

    .btn-delete {
        background: #fef2f2;
        color: #ef4444;
    }

    .btn-delete:hover {
        background: #fee2e2;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
    }

    .empty-state {
        text-align: center;
        padding: 80px 24px;
        background: white;
        border-radius: 16px;
        border: 2px dashed #e2e8f0;
    }

    .empty-state-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 24px;
        color: #cbd5e1;
    }

    .empty-state-title {
        font-size: 20px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .empty-state-text {
        color: #64748b;
        font-size: 15px;
        margin-bottom: 24px;
    }

    .no-results {
        display: none;
        text-align: center;
        padding: 60px 24px;
    }

    .no-results-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 16px;
        color: #cbd5e1;
    }

    .btn-back {
        background: white;
        color: #64748b;
        border: 2px solid #e2e8f0;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-back:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title {
            font-size: 24px;
        }

        .availabilities-table thead th,
        .availabilities-table tbody td {
            padding: 12px 16px;
        }
    }
</style>
@endsection

@section('content')
<div class="availabilities-container">
    <div class="page-header">
        <h1 class="page-title">Disponibilidades</h1>
        @if(auth()->user()->role === 'monitor')
        <a href="{{ route('availabilities.create') }}" class="btn-add">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Nova Disponibilidade
        </a>
        @endif
    </div>

    @if($availabilities->count() > 0)
    <div class="filters-card">
        <div class="search-box">
            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" id="searchInput" class="search-input" placeholder="Buscar por monitor, matéria ou dia...">
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="segunda">Segunda</button>
            <button class="filter-btn" data-filter="terça">Terça</button>
            <button class="filter-btn" data-filter="quarta">Quarta</button>
            <button class="filter-btn" data-filter="quinta">Quinta</button>
            <button class="filter-btn" data-filter="sexta">Sexta</button>
            <button class="filter-btn" data-filter="sábado">Sábado</button>
            <button class="filter-btn" data-filter="domingo">Domingo</button>
        </div>
    </div>

    <div class="availabilities-table-card">
        <div class="table-responsive">
            <table class="availabilities-table" id="availabilitiesTable">
                <thead>
                    <tr>
                        <th>Monitor</th>
                        <th>Matéria</th>
                        <th>Dia da Semana</th>
                        <th>Horário</th>
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

                    $diaFiltro = str_replace('-feira', '', $diaNomeLower);
                    @endphp
                    <tr class="availability-row"
                        data-dia="{{ $diaFiltro }}"
                        data-search="{{ strtolower($availability->monitor->name ?? '') }} {{ strtolower($availability->monitor->subject->name ?? '') }} {{ $diaNomeLower }}">
                        <td>{{ $availability->monitor->name ?? 'N/A' }}</td>
                        <td>
                            @if($availability->monitor && $availability->monitor->subject)
                            <span class="subject-badge">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                {{ $availability->monitor->subject->name }}
                            </span>
                            @else
                            <span style="color: #94a3b8;">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="day-badge {{ $diaClass }}">
                                {{ $diaNomeCompleto }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($availability->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($availability->hora_fim)->format('H:i') }}</td>
                        <td>
                            @if(auth()->user()->role === 'monitor')
                            <div class="action-buttons">
                                <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn-action btn-edit" title="Editar">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline; margin: 0;"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta disponibilidade?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Excluir">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="no-results" id="noResults">
        <svg class="no-results-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
        </svg>
        <h5 class="empty-state-title">Nenhuma disponibilidade encontrada</h5>
        <p class="empty-state-text">Tente ajustar os filtros ou busca</p>
    </div>

    @else
    <div class="empty-state">
        <svg class="empty-state-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
        <h4 class="empty-state-title">Nenhuma disponibilidade cadastrada</h4>
        <p class="empty-state-text">Comece criando a primeira disponibilidade para os monitores</p>
        @if(auth()->user()->role === 'monitor')
        <a href="{{ route('availabilities.create') }}" class="btn-add">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Nova Disponibilidade
        </a>
        @endif
    </div>
    @endif

    <div style="margin-top: 24px;">
        <a href="{{ url('/') }}" class="btn-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Voltar
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const rows = document.querySelectorAll('.availability-row');
        const noResults = document.getElementById('noResults');
        const table = document.querySelector('.availabilities-table-card');

        let currentFilter = 'all';
        let currentSearch = '';

        if (filterBtns.length > 0) {
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentFilter = this.dataset.filter;
                    applyFilters();
                });
            });
        }

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
                table.style.display = 'block';
                noResults.style.display = 'none';
            }
        }
    });
</script>
@endsection