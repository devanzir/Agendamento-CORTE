<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento de Corte de Cabelo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-image: url('{{ asset('corte.png') }}');
            background-size: cover;
            background-position: center;
            color: #fff;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin: 50px auto;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #ffcc00;
        }
        .btn-primary {
            background-color: #ffcc00;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ffd700;
        }
        .social-icons {
            text-align: center;
            margin-top: 20px;
        }
        .social-icons a {
            color: #ffcc00;
            margin: 0 15px;
            font-size: 24px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #ffd700;
        }
        .social-icons p {
            margin: 10px 0; 
            font-size: 18px; 
            line-height: 1.5; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Agendamento de Corte de Cabelo</h2>
        <form id="agendamentoForm">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <select class="form-control" id="hora" name="hora" required>
                    <option value="">Selecione uma hora</option>
                    @foreach (range(9, 11) as $h)
                        <option value="{{ sprintf('%02d:00', $h) }}">{{ sprintf('%02d:00', $h) }}</option>
                    @endforeach
                    @foreach (range(13, 18) as $h)
                        <option value="{{ sprintf('%02d:00', $h) }}">{{ sprintf('%02d:00', $h) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Confirmar Agendamento</button>
        </form>
        <div id="mensagem" class="mt-3"></div>
    </div>

    <div class="social-icons">
        <h5>Contatos e Redes Sociais</h5>
        <a href="https://www.facebook.com/share/18hd5JMR6J/?mibextid=wwXIfr" target="_blank" class="fab fa-facebook-square"></a>
        
        <a href="https://www.instagram.com/meninobom00_?igsh=MXA4cnh1aWswa3hieQ%3D%3D&utm_source=qr" target="_blank" class="fab fa-instagram"></a>

        <a href="https://wa.me/5541998300443?text=Olá,%20gostaria%20de%20mais%20informações." target="_blank" class="fab fa-whatsapp"></a> 
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $('#agendamentoForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/agendamento',
            data: $(this).serialize(),
            success: function(response) {
                $('#mensagem').html('<div class="alert alert-success">' + response.success + '</div>');
            },
            error: function(xhr) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.error 
                    ? xhr.responseJSON.error 
                    : 'Erro desconhecido. Tente novamente.';
                $('#mensagem').html('<div class="alert alert-danger">' + errorMessage + '</div>');
            }
        });
    });
    </script>
</body>
</html>