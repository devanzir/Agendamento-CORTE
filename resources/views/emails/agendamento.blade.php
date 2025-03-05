<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento Confirmado</title>
</head>
<body>
    <h1>Agendamento Confirmado</h1>
    <p>Olá {{ $nome }},</p>

    @if(isset($isDono) && $isDono)
        <p>Você recebeu um novo agendamento de corte de cabelo para {{ $cliente_nome }} no dia {{ $data }} às {{ $hora }}.</p>
    @else
        <p>Seu corte de cabelo está agendado para {{ $data }} às {{ $hora }}.</p>
    @endif

    <p>Obrigado!</p>
</body>
</html>