@extends('layouts.app')

@section('title', 'Nova Sessão')

@section('content')
<style>
    .simple-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .simple-title {
        font-size: 1.1em;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }
    
    .availability-item {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .availability-item:hover {
        border-color: #0d6efd;
        background: #f8f9fa;
    }
    
    .availability-item.selected {
        border-color: #0d6efd;
        background: #e7f1ff;
        border-width: 2px;
    }
    
    .day-label {
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 5px;
    }
    
    .time-label {
        color: #666;
        font-size: 0.95em;
    }
    
    .btn-action {
        border-radius: 20px;
        font-weight: 600;
        padding: 10px 25px;
    }
    
    @media (max-width: 576px) {
        .simple-card {
            padding: 15px;
        }
        
        .container {
            padding: 10px;
        }
        
        h1 {
            font-size: 1.5em;
        }
    }
</style>

<div class="container" style="max-width: 800px;">
    <h1 class="mb-4">Nova Sessão</h1>

    <form action="{{ route('sessions.store') }}" method="POST" id="sessionForm">
        @csrf

        <input type="hidden" name="disponibilidade_id" id="hidden_disponibilidade_id">
        <input type="hidden" name="hora_inicio" id="hidden_hora_inicio">
        <input type="hidden" name="hora_fim" id="hidden_hora_fim">

        <div class="simple-card">
            <div class="simple-title">Monitor</div>
            <select name="monitor_id" id="monitor_id" class="form-control" required>
                <option value="">Selecione um monitor...</option>
                @foreach($monitores ?? [] as $monitor)
                    <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="simple-card" id="availabilitySection" style="display: none;">
            <div class="simple-title">Horários Disponíveis</div>
            <div id="availabilityCards"></div>
        </div>

        <div class="simple-card" id="studentSection" style="display: none;">
            <div class="simple-title">Detalhes da Sessão</div>
            
            <div class="mb-3">
                <label class="form-label">Aluno</label>
                <select name="aluno_id" class="form-control" required>
                    <option value="">Selecione um aluno...</option>
                    @foreach($alunos ?? [] as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Data da Sessão</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="alert alert-info" id="summary"></div>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <button type="submit" class="btn btn-primary btn-action" id="submitBtn" style="display: none;">
                Confirmar
            </button>
            <a href="{{ route('sessions.index') }}" class="btn btn-secondary btn-action">
                ← Voltar
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const monitorSelect = document.getElementById("monitor_id");
    const availabilitySection = document.getElementById("availabilitySection");
    const studentSection = document.getElementById("studentSection");
    const availabilityCards = document.getElementById("availabilityCards");
    const submitBtn = document.getElementById("submitBtn");
    const summary = document.getElementById("summary");
    
    let selectedAvailability = null;
    let selectedMonitorName = '';

    const diasSemana = {
        'segunda': 'Segunda-feira',
        'terca': 'Terça-feira',
        'quarta': 'Quarta-feira',
        'quinta': 'Quinta-feira',
        'sexta': 'Sexta-feira',
        'sabado': 'Sábado'
    };

    monitorSelect.addEventListener("change", function () {
        const monitorId = this.value;
        selectedMonitorName = this.options[this.selectedIndex].text;
        
        availabilityCards.innerHTML = "<p class='text-center text-muted'>Carregando...</p>";
        availabilitySection.style.display = "block";
        studentSection.style.display = "none";
        submitBtn.style.display = "none";

        if (!monitorId) return;

        fetch(`/api/monitors/${monitorId}/availabilities`)
            .then(response => response.json())
            .then(avails => {
                if (!Array.isArray(avails) || avails.length === 0) {
                    availabilityCards.innerHTML = `
                        <div class="alert alert-warning mb-0">
                            Nenhum horário disponível
                        </div>
                    `;
                    return;
                }

                availabilityCards.innerHTML = '';
                avails.forEach(disp => {
                    const item = document.createElement("div");
                    item.className = "availability-item";
                    item.dataset.id = disp.id;
                    item.dataset.inicio = disp.hora_inicio;
                    item.dataset.fim = disp.hora_fim;
                    
                    const diaLabel = diasSemana[disp.dia_semana] || disp.dia_semana;
                    
                    item.innerHTML = `
                        <div class="day-label">${diaLabel}</div>
                        <div class="time-label">${disp.hora_inicio} - ${disp.hora_fim}</div>
                    `;
                    
                    item.addEventListener("click", function() {
                        document.querySelectorAll('.availability-item').forEach(c => 
                            c.classList.remove('selected')
                        );
                        this.classList.add('selected');
                        selectedAvailability = disp;
                        
                        document.getElementById("hidden_disponibilidade_id").value = disp.id;
                        document.getElementById("hidden_hora_inicio").value = disp.hora_inicio;
                        document.getElementById("hidden_hora_fim").value = disp.hora_fim;
                        
                        studentSection.style.display = "block";
                        submitBtn.style.display = "inline-block";
                        
                        updateSummary();
                    });
                    
                    availabilityCards.appendChild(item);
                });
            })
            .catch(err => {
                console.error('Erro:', err);
                availabilityCards.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        Erro ao carregar horários
                    </div>
                `;
            });
    });

    function updateSummary() {
        if (!selectedAvailability) return;
        
        const diaLabel = diasSemana[selectedAvailability.dia_semana] || selectedAvailability.dia_semana;
        summary.innerHTML = `
            <strong>Monitor:</strong> ${selectedMonitorName}<br>
            <strong>Dia:</strong> ${diaLabel}<br>
            <strong>Horário:</strong> ${selectedAvailability.hora_inicio} - ${selectedAvailability.hora_fim}
        `;
    }
});
</script>
@endsection