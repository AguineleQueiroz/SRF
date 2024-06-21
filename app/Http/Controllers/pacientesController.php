<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\AtendimentoPrimario;
use App\Models\AtendimentoSecundario;
use App\Models\DadosBasicos;
use App\Models\User;
use Illuminate\Http\Request;

class pacientesController extends Controller
{
    // Definir as propriedades $checkbox e $text_areas
    protected $checkbox = [
        'dor',
        'incapacidade',
        'osteomusculares',
        'neurologicas',
        'uroginecologicas',
        'cardiovasculares',
        'respiratorias',
        'oncologicas',
        'pediatria',
        'multiplas',
        'mova_se',
        'menos_dor_mais_saude',
        'peso_saudavel',
        'geracao_esporte',
        'nda',
        'mova_se_ra',
        'mais_saude_ra',
        'peso_saudavel_ra',
        'geracao_esporte_ra',
        'nda_ra'
    ];

    protected $text_areas = [
        'dor_descricao',
        'incapacidade_descricao',
        'osteomusculares_descricao',
        'neurologicas_descricao',
        'uroginecologicas_descricao',
        'cardiovasculares_descricao',
        'respiratorias_descricao',
        'oncologicas_descricao',
        'pediatria_descricao',
        'multiplas_descricao',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atendimento = Atendimento::find($id);

        $dados_basicos = DadosBasicos::find($atendimento['tb_dados_basicos_id']);
        $dados_primario = AtendimentoPrimario::find($atendimento['tb_atendimento_primario_id']);
        $dados_secundario = AtendimentoSecundario::find($atendimento['tb_atendimento_secundario_id']);

        $dados_basicos = $dados_basicos->toArray();
        $dados_primario = $dados_primario->toArray();
        $dados_secundario = $dados_secundario->toArray();

        $user = User::find($atendimento['user_id']);
        $responsavel = $user ? $user->name : 'N/A';

        $atendimentos[] = array_merge($dados_basicos, $dados_primario, $dados_secundario, [
            'responsavel' => $responsavel,
            'atendimento_id' => $atendimento['id']
        ]);

        return view('pacientes.app_editar_paciente', [
            'atendimentos' => $atendimentos,
        ]);
    }

    // Função para atualizar os dados do paciente
public function update(Request $request, $id)
{
    try {
        // Validação dos dados do formulário
        $request->validate($this->regras());

        // Recupera todos os dados do request
        $dadosDoRequest = $request->except('_token'); // Exclui o campo _token

        // Separar os dados em categorias específicas
        list($dados_basicos, $atendimento_primario, $atendimento_secundario) = $this->getDadosAtendimentos($dadosDoRequest);

        // Recupera o atendimento pelo ID
        $atendimento = Atendimento::find($id);

        // Verifica se o atendimento existe
        if (!$atendimento) {
            return redirect()->back()->with('error', 'Atendimento não encontrado.');
        }

        // Recupera os IDs relacionados
        $dados_basicos_id = $atendimento->tb_dados_basicos_id;
        $atendimento_primario_id = $atendimento->tb_atendimento_primario_id;
        $atendimento_secundario_id = $atendimento->tb_atendimento_secundario_id;

        // Atualiza os dados básicos
        DadosBasicos::where('id', $dados_basicos_id)->update($dados_basicos);

        // Atualiza os dados do atendimento primário
        AtendimentoPrimario::where('id', $atendimento_primario_id)->update($atendimento_primario);

        // Atualiza os dados do atendimento secundário
        AtendimentoSecundario::where('id', $atendimento_secundario_id)->update($atendimento_secundario);

        // Redireciona de volta com uma mensagem de sucesso
        return back()->with('success', 'Atendimento atualizado com sucesso.');
    } catch (\Exception $exception) {
        return $exception;
    }
}


    // Função para obter as regras de validação
    protected function regras()
    {
        return [
            'motivos' => 'nullable|array',
            'dor' => 'nullable|boolean',
            'dor_descricao' => 'nullable|string',
            'incapacidade' => 'nullable|boolean',
            'incapacidade_descricao' => 'nullable|string',
            // Adicione outras regras de validação conforme necessário
        ];
    }

    // Função para separar os dados de atendimento
    protected function getDadosAtendimentos($atendimento)
    {
        $dados_basicos = [];
        $atendimento_primario = [];
        $atendimento_secundario = [];

        foreach ($atendimento as $key => $value) {
            if (strpos($key, '_descricao') !== false || in_array($key, $this->checkbox)) {
                $atendimento_primario[$key] = $value;
            } elseif (in_array($key, $this->text_areas)) {
                $atendimento_secundario[$key] = $value;
            } else {
                $dados_basicos[$key] = $value;
            }
        }

        return [$dados_basicos, $atendimento_primario, $atendimento_secundario];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
