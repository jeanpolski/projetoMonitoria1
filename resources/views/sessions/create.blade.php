@extends('layouts.app')

@section('title', 'Nova Sessão')

@section('content')
<style>
    .availability-card {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .availability-card:hover {
        border-color: #0d6efd;
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
    .availability-card.selected {
        border-color: #0d6efd;
        background-color: #e7f1ff;
    }
    .availability-card .day {
        font-weight: bold;
        font-size: 1.1em;
        color: #0d6efd;
        margin-bottom: 5px;
    }
    .availability-card .time {
        color: #6c757d;
        font-size: 0.95em;
    }
    .availability-card .time i {
        margin-right: 5px;
    }
    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        position: relative;
    }
    .step-indicator::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e9ecef;
        z-index: 0;
    }
    .step {
        background: white;
        padding: 10px 20px;
        border-radius: 50px;
        border: 2px solid #e9ecef;
        z-index: 1;
        font-weight: 500;
        color: #6c757d;
    }
    .step.active {
        border-color: #0d6efd;
        color: #0d6efd;
        background: #e7f1ff;
    }
    .step.completed {
        border-color: #198754;
        color: #198754;
        background: #d1e7dd;
    }
    .time-slots {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 10px;
        margin-top: 15px;
    }
    .time-slot {
        padding: 12px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        font-weight: 500;
    }
    .time-slot:hover {
        border-color: #0d6efd;
        background: #f8f9fa;
    }
    .time-slot.selected {
        border-color: #0d6efd;
        background: #0d6efd;
        color: white;
    }
    .section-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .section-title {
        font-size: 1.2em;
        font-weight: 600;
        margin-bottom: 20px;
        color: #212529;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .badge-info {
        background: #cfe2ff;
        color: #084298;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85em;
        font-weight: 500;
    }
</style>

<div class="container" style="max-width: 900px;">
    <h1 class="mb-4">📅 Nova Sessão de Monitoria</h1>

    <div class="step-indicator">
        <div class="step" id="step1">1. Monitor</div>
        <div class="step" id="step2">2. Disponibilidade</div>
        <div class="step" id="step3">3. Aluno e Horário</div>
    </div>

    <form action="{{ route('sessions.store') }}" method="POST" id="sessionForm">
        @csrf

        <input type="hidden" name="disponibilidade_id" id="hidden_disponibilidade_id">
        <input type="hidden" name="hora_inicio" id="hidden_hora_inicio">
        <input type="hidden" name="hora_fim" id="hidden_hora_fim">

        <div class="section-card">
            <div class="section-title">
                👨‍🏫 Selecione o Monitor
            </div>
            <select name="monitor_id" id="monitor_id" class="form-control form-control-lg" required>
                <option value="">Escolha um monitor...</option>
                @foreach($monitores ?? [] as $monitor)
                    <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="section-card" id="availabilitySection" style="display: none;">
            <div class="section-title">
                📆 Escolha um Horário Disponível
                <span class="badge-info" id="monitorName"></span>
            </div>
            <div id="availabilityCards"></div>
        </div>

        <div class="section-card" id="studentSection" style="display: none;">
            <div class="section-title">
                👤 Informações da Sessão
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Aluno</label>
                    <select name="aluno_id" class="form-control" required>
                        <option value="" disabled selected>Selecione um aluno</option>
                        @foreach($alunos ?? [] as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Data da Sessão</label>
                    <input type="date" name="data" class="form-control" required>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <strong>📋 Resumo:</strong>
                <div id="summary" class="mt-2"></div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success btn-lg" id="submitBtn" style="display: none;">
                ✅ Confirmar Agendamento
            </button>
            <a href="{{ route('sessions.index') }}" class="btn btn-secondary btn-lg">
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
    const monitorNameBadge = document.getElementById("monitorName");
    
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
        
        document.getElementById("step1").classList.add("completed");
        document.getElementById("step2").classList.add("active");
        
        availabilityCards.innerHTML = "<p class='text-center'>⏳ Carregando disponibilidades...</p>";
        availabilitySection.style.display = "block";
        studentSection.style.display = "none";
        submitBtn.style.display = "none";

        if (!monitorId) return;

        monitorNameBadge.textContent = selectedMonitorName;

        fetch(`/api/monitors/${monitorId}/availabilities`)
            .then(response => response.json())
            .then(avails => {
                if (!Array.isArray(avails) || avails.length === 0) {
                    availabilityCards.innerHTML = `
                        <div class="alert alert-warning">
                            😔 Este monitor não possui horários disponíveis cadastrados.
                        </div>
                    `;
                    return;
                }

                availabilityCards.innerHTML = '';
                avails.forEach(disp => {
                    const card = document.createElement("div");
                    card.className = "availability-card";
                    card.dataset.id = disp.id;
                    card.dataset.inicio = disp.hora_inicio;
                    card.dataset.fim = disp.hora_fim;
                    
                    const diaLabel = diasSemana[disp.dia_semana] || disp.dia_semana;
                    
                    card.innerHTML = `
                        <div class="day">📅 ${diaLabel}</div>
                        <div class="time">
                            <i>⏰</i> ${disp.hora_inicio} até ${disp.hora_fim}
                        </div>
                    `;
                    
                    card.addEventListener("click", function() {
                        document.querySelectorAll('.availability-card').forEach(c => 
                            c.classList.remove('selected')
                        );
                        this.classList.add('selected');
                        selectedAvailability = disp;
                        
                        document.getElementById("hidden_disponibilidade_id").value = disp.id;
                        document.getElementById("hidden_hora_inicio").value = disp.hora_inicio;
                        document.getElementById("hidden_hora_fim").value = disp.hora_fim;
                        
                        document.getElementById("step2").classList.add("completed");
                        document.getElementById("step3").classList.add("active");
                        
                        studentSection.style.display = "block";
                        submitBtn.style.display = "block";
                        
                        updateSummary();
                    });
                    
                    availabilityCards.appendChild(card);
                });
            })
            .catch(err => {
                console.error('Erro:', err);
                availabilityCards.innerHTML = `
                    <div class="alert alert-danger">
                        ❌ Erro ao carregar disponibilidades. Tente novamente.
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
            <strong>Horário:</strong> ${selectedAvailability.hora_inicio} até ${selectedAvailability.hora_fim}
        `;
    }
});
</script>
@endsection