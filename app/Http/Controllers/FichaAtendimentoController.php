<?php
namespace App\Http\Controllers;

use App\Models\FichaAtendimento;
use App\Models\MotivoDescricao;
use Illuminate\Http\Request;

class FichaAtendimentoController extends Controller
{
    public function index()
    {
        // Ordena as fichas pela coluna 'created_at' em ordem decrescente
        $fichas = FichaAtendimento::orderBy('created_at', 'desc')->get();

        // Retorna a view com as fichas ordenadas
        return view('ficha_atendimento.index', compact('fichas'));
    }


    public function create()
    {
        return view('ficha_atendimento.create');
    }




    public function store(Request $request)
{
    // Validação básica
    $request->validate([
        'tipo_ficha' => 'required|in:Primário,Secundário',
        'funcional_condicao' => 'string',
        'atendimento_id' => 'required',
        'user_id' => 'required',
        'tratamento_ofertado' => 'string',
        'evolucao_funcional' => 'string',
        'sessoes' => 'array|min:1',
        'assiduidade' => 'in:assiduo,nao_assiduo',
        'ambientais_pessoais' => 'string',
        'diagnostico_fisio' => 'string',
        'criterios' => 'string',
        'justificativa' => 'string',
    ], [
        'tipo_ficha.required' => 'O campo tipo de ficha é obrigatório.',
        'tipo_ficha.in' => 'O tipo de ficha deve ser Primário ou Secundário.',
        'funcional_condicao.required' => 'O campo condição funcional é obrigatório.',
        'tratamento_ofertado.required' => 'O campo tratamento ofertado é obrigatório.',
        'evolucao_funcional.required' => 'O campo evolução funcional é obrigatório.',
        'sessoes.required' => 'Selecione pelo menos uma opção no campo "Número de sessões realizadas".',
        'sessoes.min' => 'Selecione pelo menos uma opção no campo "Número de sessões realizadas".',
        'assiduidade.required' => 'O campo assiduidade é obrigatório.',
        'assiduidade.in' => 'A assiduidade deve ser "assíduo" ou "não assíduo".',
        'ambientais_pessoais.required' => 'O campo fatores ambientais e pessoais é obrigatório.',
        'diagnostico_fisio.required' => 'O campo diagnóstico fisioterapêutico é obrigatório.',
        'criterios.required' => 'O campo critérios para alta é obrigatório.',
        'justificativa.required' => 'O campo justificativa é obrigatório.',
    ]);

    $data = [];

    // Definir os campos conforme o tipo de ficha
    if ($request->input('tipo_ficha') === 'Primário') {
        $data = $this->handlePrimarioFields($request);
    } elseif ($request->input('tipo_ficha') === 'Secundário') {
        $data = $this->handleSecundarioFields($request);
    }

    // Criação do registro com os campos tratados
    $fichaAtendimento = FichaAtendimento::create($data);

    // Salvar motivos e descrições
    if ($request->has('motivos')) {
        $motivos = $request->input('motivos', []);
        $descricoes = $request->input('motivo_descricao', []);
        foreach ($motivos as $motivo) {
            MotivoDescricao::create([
                'ficha_atendimento_id' => $fichaAtendimento->id,
                'motivo' => $motivo,
                'descricao' => $descricoes[$motivo] ?? null,
            ]);
        }
    }

    return back()->with('success', 'Ficha de Atendimento criada com sucesso.');
}

private function handlePrimarioFields(Request $request)
{
    return [
        'tipo_ficha' => $request->tipo_ficha,
        'atendimento_id' => $request->atendimento_id,
        'user_id' => $request->user_id,
        'motivos' => json_encode($request->input('motivos', [])),
        'queixa' => $request->input('queixa', null),
        'achados_exame_fisico' => $request->input('achados_exame_fisico', null),
        'testes_padronizados' => $request->input('testes_padronizados', null),
        'condicao_funcional' => $request->input('condicao_funcional', null),
        'fatores_ambientais' => $request->input('fatores_ambientais', null),
        'diagnostico_fisioterapeutico' => $request->input('diagnostico_fisioterapeutico', null),
        'atividades' => json_encode($request->input('atividades', [])),
        'atividades_passadas' => json_encode($request->input('atividades_passadas', [])),
    ];
}

private function handleSecundarioFields(Request $request)
{
    return [
        'tipo_ficha' => $request->tipo_ficha,
        'atendimento_id' => $request->atendimento_id,
        'user_id' => $request->user_id,
        'funcional_condicao' => $request->input('funcional_condicao', null),
        'tratamento_ofertado' => $request->input('tratamento_ofertado', null),
        'evolucao_funcional' => $request->input('evolucao_funcional', null),
        'sessoes' => json_encode($request->input('sessoes', [])),
        'assiduidade' => $request->input('assiduidade', null),
        'ambientais_pessoais' => $request->input('ambientais_pessoais', null),
        'diagnostico_fisio' => $request->input('diagnostico_fisio', null),
        'criterios' => $request->input('criterios', null),
        'justificativa' => $request->input('justificativa', null),
    ];
}



    public function show(FichaAtendimento $fichaAtendimento)
    {
        return view('ficha_atendimento.show', compact('fichaAtendimento'));
    }

    public function edit(FichaAtendimento $fichaAtendimento)
    {
        return view('ficha_atendimento.edit', compact('fichaAtendimento'));
    }

    public function update(Request $request, FichaAtendimento $fichaAtendimento)
    {
        $request->validate([
            // Adicione validações específicas para cada campo aqui
        ]);

        $fichaAtendimento->update($request->all());

        return redirect()->route('ficha_atendimento.index')
                         ->with('success', 'Ficha de Atendimento atualizada com sucesso.');
    }

    public function destroy(FichaAtendimento $fichaAtendimento)
    {
        $fichaAtendimento->delete();

        return back()->with('success', 'Ficha de Atendimento removida com sucesso.');
    }
}
