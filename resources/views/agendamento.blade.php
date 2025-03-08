<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Corte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
        }
        .container-fluid {
            display: flex;
            padding: 0;
        }
        .left-section {
            flex: 1;
            background: url('{{ asset('corte.png') }}') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: rgb(255, 255, 255);
            padding: 20px;
        }
        h2 {
            font-size: 36px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons a {
            color: #ffffff;
            font-size: 24px;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #484a48; /* Cor ao passar o mouse */
        }
        .right-section {
            flex: 1;
            max-width: 550px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .form-container {
            width: 100%;
            max-width: 350px;
            padding: 20px;
        }
        .btn-group .btn {
            width: 48%;
            margin: 2px;
        }
        .time-slot {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .time-slot button {
            flex: 1;
            min-width: 30%;
        }
        .form-control {
            border-radius: 25px;
            border: 2px solid #282222;
            transition: border 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #252627;
            box-shadow: 0 0 10px rgba(29, 40, 52, 0.5);
        }
        .btn-warning {
            border-radius: 25px;
        }
        /* Media Queries */
@media (max-width: 768px) {
    .container-fluid {
        flex-direction: column; /* Empilha as seções verticalmente */
    }
    .left-section, .right-section {
        max-width: 100%; /* Faz as seções ocuparem toda a largura */
    }
    h2 {
        font-size: 28px; /* Reduz o tamanho do cabeçalho */
    }
    p {
        font-size: 16px; /* Ajusta o tamanho do texto */
    }
    .form-container {
        padding: 10px; /* Reduz o padding em telas menores */
    }
    .social-icons {
        justify-content: center; /* Centraliza os ícones */
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 24px; /* Tamanho ainda menor para telas muito pequenas */
    }
    p {
        font-size: 14px; /* Ajusta o tamanho do texto */
    }
    .form-control {
        font-size: 14px; /* Tamanho de fonte dos campos de entrada */
    }
    .btn {
        font-size: 14px; /* Tamanho do botão */
    }
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="left-section">
            <h2>Studio D' Quebrada</h2>
            <p>Experiência premium em cortes de cabelo e barba para o homem moderno.</p>
            <div class="social-icons">
                <h5>Contatos e Redes Sociais</h5>
                <a href="https://www.facebook.com/share/18hd5JMR6J/?mibextid=wwXIfr" target="_blank" class="fab fa-facebook-square"></a>
                <a href="https://www.instagram.com/meninobom00_?igsh=MXA4cnh1aWswa3hieQ%3D%3D&utm_source=qr" target="_blank" class="fab fa-instagram"></a>
                <a href="https://wa.me/5541998300443?text=Olá,%20gostaria%20de%20mais%20informações." target="_blank" class="fab fa-whatsapp"></a> 
            </div>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h3>Agendamento de Corte</h3>
                <p>Escolha o serviço e horário de sua preferência</p>
                <form id="agendamentoForm">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nome" placeholder="Nome Completo" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" id="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="mb-3 btn-group">
                        <button type="button" class="btn btn-outline-secondary" data-servico="Corte de Cabelo">Corte de Cabelo</button>
                        <button type="button" class="btn btn-outline-secondary" data-servico="Barba">Barba</button>
                        <button type="button" class="btn btn-outline-secondary" data-servico="Combo">Combo (Cabelo + Barba)</button>
                        <button type="button" class="btn btn-outline-secondary" data-servico="Hidratação">Hidratação</button>
                    </div>
                    <input type="hidden" id="servico" name="servico" required>
                    <div class="mb-3">
                        <input type="date" class="form-control" id="data" required>
                    </div>
                    <div class="mb-3 time-slot">
                        <button type="button" class="btn btn-outline-primary" value="09:00">09:00</button>
                        <button type="button" class="btn btn-outline-primary" value="10:00">10:00</button>
                        <button type="button" class="btn btn-outline-primary" value="11:00">11:00</button>
                        <button type="button" class="btn btn-outline-primary" value="13:00">13:00</button>
                        <button type="button" class="btn btn-outline-primary" value="14:00">14:00</button>
                        <button type="button" class="btn btn-outline-primary" value="15:00">15:00</button>
                        <button type="button" class="btn btn-outline-primary" value="16:00">16:00</button>
                        <button type="button" class="btn btn-outline-primary" value="17:00">17:00</button>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="observacoes" placeholder="Observações (opcional)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Confirmar Agendamento</button>
                </form>
                <div id="mensagem" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        const today = new Date();
        const dayOfWeek = today.getDay();

        // Ajustar o valor mínimo da data
        const minDate = new Date();
        if (dayOfWeek < 2) {
            minDate.setDate(today.getDate() + (2 - dayOfWeek + 7) % 7);
        } else {
            minDate.setDate(today.getDate());
        }

        const maxDate = new Date();
        maxDate.setDate(minDate.getDate() + (6 - dayOfWeek)); // Próximo sábado

        // Definindo o atributo min e max do input de data
        $('#data').attr('min', minDate.toISOString().split('T')[0]);
        $('#data').attr('max', maxDate.toISOString().split('T')[0]);

        // Selecionar serviço
        $('.btn-group .btn').on('click', function() {
            $('.btn-group .btn').removeClass('active'); // Remove a classe active de todos os botões
            $(this).addClass('active'); // Adiciona a classe active ao botão clicado

            // Atualiza o campo oculto com o serviço selecionado
            $('#servico').val($(this).data('servico'));
            console.log('Serviço selecionado:', $(this).data('servico')); // Log para depuração
        });

        // Selecionar horário
        $('.time-slot button').on('click', function() {
            $('.time-slot button').removeClass('active'); // Remove a classe active de todos os botões
            $(this).addClass('active'); // Adiciona a classe active ao botão clicado
            console.log('Horário selecionado:', $(this).val()); // Log para depuração
        });

        $('#agendamentoForm').on('submit', function(e) {
            e.preventDefault();

            const nome = $('#nome').val();
            const email = $('#email').val();
            const telefone = $('#telefone').val();
            const data = $('#data').val();
            const hora = $('.time-slot button.active').val(); // Captura o valor do horário ativo
            const servico = $('#servico').val(); // Captura o valor do serviço
            const observacoes = $('#observacoes').val();

            if (!servico) {
                $('#mensagem').html('<div class="alert alert-danger">Por favor, selecione um serviço.</div>');
                return;
            }

            if (!hora) {
                $('#mensagem').html('<div class="alert alert-danger">Por favor, selecione um horário.</div>');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '/agendamento',
                data: {
                    nome: nome,
                    email: email,
                    telefone: telefone,
                    data: data,
                    hora: hora,
                    servico: servico,
                    observacoes: observacoes,
                    _token: '{{ csrf_token() }}'
                },
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
    });
    </script>
</body>
</html>