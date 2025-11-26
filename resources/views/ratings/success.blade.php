<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Enviada</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let countdown = 3;
            const countdownEl = document.getElementById('countdown');
            const progressBar = document.getElementById('progress-bar');

            const interval = setInterval(() => {
                countdown--;
                if (countdownEl) countdownEl.textContent = countdown;

                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = "{{ route('sessions.index') }}";
                }
            }, 1000);
        });
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        .success-card {
            background: white;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }

        .check-circle {
            width: 80px;
            height: 80px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            animation: checkmark 0.5s ease-out;
        }

        .progress-bar-container {
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
            margin: 24px 0 16px;
        }

        .progress-bar-fill {
            height: 100%;
            background: #10b981;
            animation: progress 3s linear;
        }

        .btn-success {
            background: #10b981;
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            margin-top: 16px;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }
    </style>
</head>

<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px;">
    <div class="success-card">
        <div class="check-circle">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>

        <h2 style="color: #1e293b; font-weight: 700; font-size: 28px; margin-bottom: 12px;">
            Avaliação Enviada com Sucesso!
        </h2>

        <p style="color: #64748b; font-size: 16px; margin-bottom: 32px;">
            Obrigado pelo seu feedback! Sua avaliação ajuda a melhorar a qualidade do atendimento.
        </p>

        <div class="progress-bar-container">
            <div class="progress-bar-fill" id="progress-bar"></div>
        </div>

        <p style="color: #94a3b8; font-size: 14px;">
            Redirecionando em <span id="countdown">3</span> segundos...
        </p>

        <a href="{{ route('sessions.index') }}" class="btn-success">
            Ir agora para lista de sessões
        </a>
    </div>
</body>

</html>