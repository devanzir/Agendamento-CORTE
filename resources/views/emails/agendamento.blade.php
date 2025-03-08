<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Agendamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #4CAF50;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            font-size: 14px;
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table role="presentation" width="100%" style="max-width: 600px; margin: 20px auto; background: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <tr>
                <td style="background: #2a5298; padding: 20px; text-align: center; color: white; font-size: 24px; font-weight: bold;">
                    Studio D' Quebrada
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; text-align: center;">
                    <h2 style="color: #2a5298;">Olá, {{ $nome }}</h2>
                    <p style="font-size: 16px; color: #333;">Seu agendamento foi confirmado!</p>
                    <p style="font-size: 18px; font-weight: bold; color: #2a5298;">📅 Data: <strong>{{ $data }}</strong> ⏰ Horário: <strong>{{ $hora }}</strong></p>
                    <p style="font-size: 16px; color: #555;">Serviço: <strong>{{ $servico }}</strong></p>
                    @if(isset($isDono) && $isDono)
                        <p style="font-size: 16px; color: #555;">Cliente: <strong>{{ $cliente_nome }}</strong></p>
                    @endif
                    <p style="font-size: 14px; color: #777;">Obrigado por escolher o Studio D' Quebrada! Esperamos você no dia e horário marcados.</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; padding: 20px;">
                    <a href="{{ url('/') }}" class="button">Visite nosso site</a>
                </td>
            </tr>
            <tr>
                <td style="background: #2a5298; padding: 10px; text-align: center; color: white; font-size: 12px;">
                    &copy; 2025 Studio D' Quebrada - Todos os direitos reservados
                </td>
            </tr>
        </table>
        <div class="footer">
            <p>Studio DQ</p>
        </div>
    </div>
</body>
</html>
