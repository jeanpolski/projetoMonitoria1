@extends('layouts.app')

@section('title', 'Nova Sessão')

@section('content')
<div style="min-height: 100vh; background: linear-gradient(to bottom right, #f9fafb, #f3f4f6); padding: 2rem 1rem;">
    <div style="max-width: 900px; margin: 0 auto;">
        <div style="margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">Nova Sessão</h1>
            <p style="color: #6b7280; font-size: 0.95rem;">Selecione o monitor, horário e preencha os dados da sessão</p>
        </div>

        <form action="{{ route('sessions.store') }}" method="POST" id="sessionForm">
            @csrf

            <input type="hidden" name="disponibilidade_id" id="hidden_disponibilidade_id">
            <input type="hidden" name="hora_inicio" id="hidden_hora_inicio">
            <input type="hidden" name="hora_fim" id="hidden_hora_fim">

            <div style="background: white; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                    <svg style="width: 20px; height: 20px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <label style="font-weight: 600; color: #1f2937; font-size: 1rem; margin: 0;">Monitor</label>
                </div>
                <select name="monitor_id" id="monitor_id" class="form-control" style="border-radius: 8px; border: 1px solid #d1d5db; padding: 0.75rem; font-size: 0.95rem; transition: all 0.2s;" required>
                    <option value="">Selecione um monitor...</option>
                    @foreach($monitores ?? [] as $monitor)
                        <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="availabilitySection" style="background: white; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: none;">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                    <svg style="width: 20px; height: 20px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 style="font-weight: 600; color: #1f2937; font-size: 1rem; margin: 0;">Horários Disponíveis</h3>
                </div>
                <div id="availabilityCards"></div>
            </div>

            <div id="studentSection" style="background: white; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: none;">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <svg style="width: 20px; height: 20px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 style="font-weight: 600; color: #1f2937; font-size: 1rem; margin: 0;">Detalhes da Sessão</h3>
                </div>
                
                <div style="margin-bottom: 1.25rem;">
                    <label style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.9rem;">Aluno</label>
                    <select name="aluno_id" class="form-control" style="border-radius: 8px; border: 1px solid #d1d5db; padding: 0.75rem; font-size: 0.95rem; width: 100%; transition: all 0.2s;" required>
                        <option value="">Selecione um aluno...</option>
                        @foreach($alunos ?? [] as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 1.25rem;">
                    <label style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.9rem;">Data da Sessão</label>
                    <input type="date" name="data" class="form-control" style="border-radius: 8px; border: 1px solid #d1d5db; padding: 0.75rem; font-size: 0.95rem; width: 100%; transition: all 0.2s;" required>
                </div>

                <div id="summary" style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 1rem; border-radius: 6px; color: #1e40af; font-size: 0.9rem;"></div>
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" id="submitBtn" style="background: #3b82f6; color: white; border: none; padding: 0.75rem 2rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: none;">
                    Confirmar Sessão
                </button>
                <a href="{{ route('sessions.index') }}" style="background: #6b7280; color: white; border: none; padding: 0.75rem 2rem; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    select:focus, input:focus {
        outline: none;
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }
    
    .availability-item {
        padding: 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        cursor: pointer;
        transition: all 0.2s;
        background: white;
    }
    
    .availability-item:hover {
        border-color: #3b82f6;
        background: #f0f9ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    
    .availability-item.selected {
        border-color: #3b82f6;
        background: #eff6ff;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .day-label {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }
    
    .time-label {
        color: #6b7280;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    }
    
    a[href]:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    }
</style>

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
        
        availabilityCards.innerHTML = "<p style='text-align: center; color: #6b7280; padding: 1rem;'>Carregando horários...</p>";
        availabilitySection.style.display = "block";
        studentSection.style.display = "none";
        submitBtn.style.display = "none";

        if (!monitorId) {
            availabilitySection.style.display = "none";
            return;
        }

        fetch(`/api/monitors/${monitorId}/availabilities`)
            .then(response => response.json())
            .then(avails => {
                if (!Array.isArray(avails) || avails.length === 0) {
                    availabilityCards.innerHTML = `
                        <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 1rem; border-radius: 6px; color: #92400e;">
                            <strong>Nenhum horário disponível</strong>
                            <p style="margin: 0.25rem 0 0 0; font-size: 0.9rem;">Este monitor não possui horários cadastrados.</p>
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
                        <div class="time-label">
                            <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            ${disp.hora_inicio} - ${disp.hora_fim}
                        </div>
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
                    <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem; border-radius: 6px; color: #991b1b;">
                        <strong>Erro ao carregar horários</strong>
                        <p style="margin: 0.25rem 0 0 0; font-size: 0.9rem;">Tente novamente mais tarde.</p>
                    </div>
                `;
            });
    });

    function updateSummary() {
        if (!selectedAvailability) return;
        
        const diaLabel = diasSemana[selectedAvailability.dia_semana] || selectedAvailability.dia_semana;
        summary.innerHTML = `
            <strong style="font-size: 0.95rem;">Resumo da Sessão</strong><br>
            <div style="margin-top: 0.5rem; line-height: 1.6;">
                <strong>Monitor:</strong> ${selectedMonitorName}<br>
                <strong>Dia:</strong> ${diaLabel}<br>
                <strong>Horário:</strong> ${selectedAvailability.hora_inicio} - ${selectedAvailability.hora_fim}
            </div>
        `;
    }
});
</script>
@endsection
