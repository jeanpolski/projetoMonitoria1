<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Enviada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script>
        // Redireciona após 2 segundos
        setTimeout(function() {
            window.location.href = "{{ route('sessions.index') }}";
        }, 2000);
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">✅ {{ $message }}</h4>
            <p>Você será redirecionado em 2 segundos...</p>
            <hr>
            <p class="mb-0">
                <a href="{{ route('sessions.index') }}" class="btn btn-success">Ir agora para lista de sessões</a>
            </p>
        </div>
    </div>
</body>
</html>