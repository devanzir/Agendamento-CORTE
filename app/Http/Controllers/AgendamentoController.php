<?php

namespace App\Http\Controllers;

use App\Mail\AgendamentoMail;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgendamentoController extends Controller
{
    private const DONO_EMAIL = 'fritzledir@gmail.com';
    public function index()
    {
        return view('agendamento');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'telefone' => 'required|string|max:15',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'servico' => 'required|string|max:255', 
        ]);

        $existingAgendamento = Agendamento::where('data', $request->data)
            ->where('hora', $request->hora)
            ->first();

        if ($existingAgendamento) {
            return response()->json(['error' => 'Já existe um agendamento para essa data e horário.'], 400);
        }


        try {
            $agendamento = Agendamento::create($request->all());
            
            $donoEmail = 'fritzledir@gmail.com';

             Mail::to(self::DONO_EMAIL)->send(new AgendamentoMail([
                'nome' => 'Studio D Quebrada',
                'cliente_nome' => $agendamento->nome,
                'data' => $agendamento->data,
                'hora' => $agendamento->hora,
                'servico' => $agendamento->servico,
                'isDono' => true,
            ]));

            Mail::to($request->email)->send(new AgendamentoMail([
                'nome' => $agendamento->nome,
                'data' => $agendamento->data,
                'hora' => $agendamento->hora,
                'servico' => $agendamento->servico, 
                'isDono' => false,
            ]));


            return response()->json(['success' => 'Agendamento confirmado!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar agendamento: ' . $e->getMessage()], 500);
        }
    }
}
