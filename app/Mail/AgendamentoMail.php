<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgendamentoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $cliente_nome;
    public $data;
    public $hora;
    public $isDono;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->nome = $data['nome'];
        $this->cliente_nome = $data['cliente_nome'] ?? null;
        $this->data = $data['data'];
        $this->hora = $data['hora'];
        $this->isDono = $data['isDono'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Agendamento De Corte ',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.agendamento')
                    ->with([
                        'nome' => $this->nome,
                        'cliente_nome' => $this->cliente_nome,
                        'data' => $this->data,
                        'hora' => $this->hora,
                        'isDono' => $this->isDono,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}