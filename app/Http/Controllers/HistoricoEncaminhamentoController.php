<?php

namespace App\Http\Controllers;

use App\Models\EncaminhamentoHistorico;
use App\Models\HistoricoEncaminhamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricoEncaminhamentoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $historicos = EncaminhamentoHistorico::where('encaminhamento', $user->attention_type)->get();

        return view('encaminhamentos.app_historico_encaminhamentos', ['historicos' => $historicos]);
    }
}
