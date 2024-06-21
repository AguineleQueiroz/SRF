<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\AtendimentoPrimario; // Importe o modelo Atendimentos aqui
use App\Models\AtendimentoSecundario;
use App\Models\DadosBasicos;
use App\Models\EncaminhamentoHistorico;
use App\Models\FichaAtendimento;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AtendimentoController extends Controller
{
    public function regras(){
        return [

            //Dados Básicos

            //1º tópico: Informações

            'nome' => 'required|string|max:255',

            'idade' => 'required|integer',

            'sexo' => 'required|in:masculino,feminino',

            'contato' => 'required|string|max:20',

            'data_nascimento' => 'required|date',

            'cartao_sus' => 'required|string|max:20',

            'endereco' => 'required|string|max:255',

            'data_cadastro' => 'required|date',

            //2º tópico: Unidade Básica de Saúde

            'ubs' => 'required|string|max:255',

            'acs' => 'required|string|max:255',

            //3º tópico: Condições de Saúde

            'diagnostico' => 'required|string',

            'comorbidades' => 'nullable|string',

            'ultima_internacao' => 'nullable|date',

            'responsavel_cadastro' => 'nullable|string|max:255',

            'medico_responsavel' => 'nullable|string|max:255',

            //4º tópico: Nível de prioridade

            'prioridade' => 'required|in:alta,media,baixa',

            //Primária
            //5º tópico: Atenção Primária

            'dor' => 'nullable',

            'dor_descricao' => 'nullable|string|max:2000',

            'incapacidade' => 'nullable',

            'incapacidade_descricao' => 'nullable|string|max:2000',

            'osteomusculares' => 'nullable',

            'osteomusculares_descricao' => 'nullable|string|max:2000',

            'neurologicas' => 'nullable',

            'neurologicas_descricao' => 'nullable|string|max:2000',

            'uroginecologicas' => 'nullable',

            'uroginecologicas_descricao' => 'nullable|string|max:2000',

            'cardiovasculares' => 'nullable',

            'cardiovasculares_descricao' => 'nullable|string|max:2000',

            'respiratorias' => 'nullable',

            'respiratorias_descricao' => 'nullable|string|max:2000',

            'oncologicas' => 'nullable',

            'oncologicas_descricao' => 'nullable|string|max:2000',

            'pediatria' => 'nullable',

            'pediatria_descricao' => 'nullable|string|max:2000',

            'multiplas' => 'nullable',

            'multiplas_descricao' => 'nullable|string|max:2000',

            //6º tópico: Avaliação Fisioterapêutica

            'queixa' => 'nullable|string|max:2000',

            'achados_exame_fisico' => 'nullable|string|max:2000',

            'testes_padronizados' => 'nullable|string|max:2000',

            'condicao_funcional' => 'nullable|string|max:2000',

            'fatores_ambientais' => 'nullable|string|max:2000',

            'diagnostico_fisioterapeutico' => 'nullable|string|max:2000',

            //7º tópico: Atividades ou grupos operativos

            'mova_se' => 'nullable',

            'menos_dor_mais_saude' => 'nullable',

            'peso_saudavel' => 'nullable',

            'geracao_esporte' => 'nullable',

            'nda' => 'nullable',

            //8º tópico: Atividades ou grupos operativos dos quais o usuário já participou

            'mova_se_participou' => 'nullable',

            'mais_saude_participou' => 'nullable',

            'peso_saudavel_participou' => 'nullable',

            'geracao_esporte_participou' => 'nullable',

            'nda_participou' => 'nullable',

            //Secundario
            //5º tópico: Atenção Secundária

            'funcional_condicao' => 'nullable|string|max:2000',

            'tratamento_ofertado' => 'nullable|string|max:2000',

            'evolucao_funcional' => 'nullable|string|max:2000',

            //6º tópico: Sessões Realizadas

            'Menos_de_10' => 'nullable',

            '10_20' => 'nullable',

            '20_30' => 'nullable',

            'Mais_de_30' => 'nullable',

            //7º tópico: Assiduidade do paciente

            'assiduidade' => 'nullable|in:assiduo,nao_assiduo',

            //8º tópico: Fatores Ambientais e Pessoais

            'ambientais_pessoais' => 'nullable|string|max:2000',

            'diagnostico_fisio' => 'nullable|string|max:2000',

            'criterios' => 'nullable|string|max:2000',

            'justificativa' => 'nullable|string|max:2000',

        ];
    }

    public function getDadosAtendimentos($atendimento){

        $array_basicos = [
            'nome',
            'idade',
            'sexo',
            'contato',
            'data_nascimento',
            'cartao_sus',
            'endereco',
            'data_cadastro',
            'ubs',
            'acs',
            'diagnostico',
            'comorbidades',
            'ultima_internacao',
            'responsavel_cadastro',
            'medico_responsavel',
            'prioridade'
        ];

        $array_secundarios = [
            'funcional_condicao',
            'tratamento_ofertado',
            'evolucao_funcional',
            'sessoes',
            'assiduidade',
            'ambientais_pessoais',
            'diagnostico_fisio',
            'criterios',
            'justificativa',
            'atividades',
            'atividades_passadas'
        ];

        $basicos=[];
        $primario=[];
        $secundario=[];


        foreach($atendimento as $key => $valor){

            if($key==='_token'){

                continue;

            }

            if(in_array($key, $array_basicos)){

                $basicos[$key]= $valor;

            }
            elseif(in_array($key, $array_secundarios)){

                $secundario[$key] = $valor;

            }
            else{

                $primario[$key] = $valor;
            }
        }

        return [$basicos, $primario, $secundario];
    }

    public function edit($id)
    {

        // Recuperar o atendimento pelo ID
        $atendimento = Atendimento::findOrFail($id);

        $atendimento = $atendimento->toArray();

        $dados_basicos=DadosBasicos::find($atendimento['tb_dados_basicos_id'])->toArray();
        $dados_primario=AtendimentoPrimario::find($atendimento['tb_atendimento_primario_id'])->toArray();
        $dados_secundario=AtendimentoSecundario::find($atendimento['tb_atendimento_secundario_id'])->toArray();

        $atendimento=array_merge($dados_basicos, $dados_primario, $dados_secundario, ['atendimento_id'=>$id]);
        // Retornar a view de edição com os dados do atendimento
        return view('modalatendimento', compact('atendimento'));
    }


    public function update(Request $request, $id)
    {
        try {
            // Validação dos dados de entrada
            $request->validate($this->regras());

            // Recupera o atendimento pelo ID
            $atendimento = Atendimento::findOrFail($id);

            // Atualiza os dados básicos do atendimento
            $dados_basicos = $request->only([
                'nome',
                'idade',
                'sexo',
                'contato',
                'data_nascimento',
                'cartao_sus',
                'endereco',
                'data_cadastro',
                'ubs',
                'acs',
                'diagnostico',
                'comorbidades',
                'ultima_internacao',
                'responsavel_cadastro',
                'medico_responsavel',
                'prioridade'
            ]);
            $atendimento->dados_basicos()->update($dados_basicos);

            // Atualiza os dados do atendimento primário
            $atendimento_primario = $request->only([
                'dor',
                'dor_descricao',
                'incapacidade',
                'incapacidade_descricao',
                'osteomusculares',
                'osteomusculares_descricao',
                'neurologicas',
                'neurologicas_descricao',
                'uroginecologicas',
                'uroginecologicas_descricao',
                'cardiovasculares',
                'cardiovasculares_descricao',
                'respiratorias',
                'respiratorias_descricao',
                'oncologicas',
                'oncologicas_descricao',
                'pediatria',
                'pediatria_descricao',
                'multiplas',
                'multiplas_descricao',
                'queixa',
                'achados_exame_fisico',
                'testes_padronizados',
                'condicao_funcional',
                'fatores_ambientais',
                'diagnostico_fisioterapeutico',
                'mova_se',
                'menos_dor_mais_saude',
                'peso_saudavel',
                'geracao_esporte',
                'nda',
                'mova_se_participou',
                'mais_saude_participou',
                'peso_saudavel_participou',
                'geracao_esporte_participou',
                'nda_participou',

            ]);
            $atendimento->atendimento_primario()->update($atendimento_primario);

            // Atualiza os dados do atendimento secundário
            $atendimento_secundario = $request->only([
                'funcional_condicao',
                'tratamento_ofertado',
                'evolucao_funcional',
                'sessoes',
                'assiduidade',
                'ambientais_pessoais',
                'diagnostico_fisio',
                'criterios',
                'justificativa',
                'atividades',
                'atividades_passadas'
            ]);
            $atendimento->atendimento_secundario()->update($atendimento_secundario);

            return redirect()->route('dashboard')->with('success', 'Atendimento atualizado com sucesso!');
        } catch (\Exception $exception) {
            dd($exception); // Tratar o erro conforme necessário
        }
    }



    public function salvarDados(Request $request)
    {
        try {
            $checkbox = [
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

            $text_areas = [
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

            $request->validate($this->regras());

            $atendimento = $request->all();

            list($dados_basicos, $atendimento_primario, $atendimento) = $this->getDadosAtendimentos($atendimento);

            if (isset($atendimento_primario['motivos']) && isset($atendimento_primario['motivos-descricao'])) {

                $motivos = $atendimento_primario['motivos'];
                $motivosDescricao = $atendimento_primario['motivos-descricao'];

                // Remover motivos e descrições com valor nulo
                $filteredMotivos = [];
                $filteredMotivosDescricao = [];
                foreach ($motivos as $key => $motivo) {
                    if (!empty($motivo) && isset($motivosDescricao[$key])) {
                        $filteredMotivos[] = $motivo;
                        $filteredMotivosDescricao[] = $motivosDescricao[$key];
                    }
                }

                $atendimento_primario['motivos-descricao'] = $filteredMotivosDescricao;

                $motivosedescricao = array_combine($filteredMotivos, $filteredMotivosDescricao);

                unset($atendimento_primario['motivos-descricao']);
                unset($atendimento_primario['motivos']);

                foreach ($motivosedescricao as $motivo => $descricao) {
                    $atendimento_primario[strtolower($motivo)] = 1;
                    $atendimento_primario[strtolower($motivo) . '_descricao'] = $descricao;
                }
            }

            $primario = AtendimentoPrimario::create($atendimento_primario);
            $secundario = AtendimentoSecundario::create($atendimento);
            $dadosbasicos = DadosBasicos::create($dados_basicos);

            $arr = [
                'user_id' => Auth::id(),
                'tb_dados_basicos_id' => $dadosbasicos->id,
                'tb_atendimento_primario_id' => $primario->id ?? $dados_basicos->id,
                'tb_atendimento_secundario_id' => $secundario->id ?? $dados_basicos->id,
            ];

            Atendimento::create($arr);

            return redirect()->route('dashboard')->with('success', 'Dados salvos com sucesso!');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }


    public function renderizarView()
    {
        return view('formprimario');
    }

    public function listarAtendimentos(Request $request)
    {
        $user = Auth::user(); // Obtém o usuário autenticado

        $filtrarAtendimentos = $request->query('filtrar_atendimentos', 'false') === 'true';
        $atendimentos = [];

        if ($filtrarAtendimentos) {
            $atendimentos = Atendimento::where('encaminhamento', $user->attention_type)->get();
        } else {
            $atendimentos = Atendimento::all();
            $atendimentosids = Atendimento::all();
        }

       // Obter a data de hoje
        $today = Carbon::today();

        // Filtrar os históricos para pegar apenas aqueles da data de hoje
        $historicos_encaminhamentos = EncaminhamentoHistorico::where('encaminhamento', $user->attention_type)
            ->whereDate('created_at', $today)
            ->get();


        $message = '';
        $alertType = '';

        if ($historicos_encaminhamentos->count() > 0) {
            $message = 'Você tem novos encaminhamentos hoje.';
            $alertType = 'success';
        } else {
            $message = 'Não há novos encaminhamentos hoje.';
            $alertType = 'danger';
        }

        // return $historicos_encaminhamentos;
        // Filtra os atendimentos pelo user_id do usuário autenticado

        $dados_basicos = [];
        $dados_primario = [];
        $dados_secundario = [];
        $atendimentosFiltrados = [];

        foreach ($atendimentos as $atendimento) {
            $atendimentoArray = $atendimento->toArray();

            $dados_basicos = DadosBasicos::find($atendimentoArray['tb_dados_basicos_id']);
            $dados_primario = AtendimentoPrimario::find($atendimentoArray['tb_atendimento_primario_id']);
            $dados_secundario = AtendimentoSecundario::find($atendimentoArray['tb_atendimento_secundario_id']);

            if (!$dados_basicos || !$dados_primario || !$dados_secundario) {
                // Se qualquer um dos registros não for encontrado, pule este atendimento
                continue;
            }

            $dados_basicos = $dados_basicos->toArray();
            $dados_primario = $dados_primario->toArray();
            $dados_secundario = $dados_secundario->toArray();

            $responsavel = $user ? $user->name : 'N/A';

            $atendimentosFiltrados[] = array_merge($dados_basicos, $dados_primario, $dados_secundario, [
                'responsavel' => $responsavel,
                'atendimento_id' => $atendimentoArray['id'],
                'encaminhamento' => $atendimentoArray['encaminhamento']
            ]);
        }

        $search = $request->input('search');
        if (isset($search)) {
            $atendimentos_filtrados = [];
            foreach ($atendimentosFiltrados as $atendimento) {
                if (str_contains($atendimento['nome'], $search) || str_contains($atendimento['cartao_sus'], $search)) {
                    $atendimentos_filtrados[] = $atendimento;
                }
            }
            $atendimentosFiltrados = $atendimentos_filtrados;
        }

        return view('dashboard', ['atendimentos' => $atendimentosFiltrados,'message' => $message,
                                'alertType' => $alertType], compact('historicos_encaminhamentos'));
    }

    public function encaminhar(Request $request)
    {
        // Validação dos dados do formulário de encaminhamento
        $request->validate([
            'atendimento_id' => 'required|exists:atendimentos,id',
            'encaminhamento' => 'required|in:Primário,Secundário', // ajuste conforme suas necessidades
        ]);

        try {
            // Obtendo o atendimento pelo ID
            $atendimento = Atendimento::findOrFail($request->atendimento_id);

            // Atualizando a coluna encaminhamento no atendimento
            $atendimento->encaminhamento = $request->encaminhamento;
            $atendimento->save();

            // Obtendo o ID do usuário logado
            $userId = Auth::id();

            // Registrando o histórico de encaminhamento com o ID do usuário logado
            EncaminhamentoHistorico::create([
                'atendimento_id' => $atendimento->id,
                'encaminhamento' => $request->encaminhamento,
                'user_id' => $userId,
            ]);

            return redirect()->back()->with('success', 'Encaminhamento realizado com sucesso.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Erro ao realizar o encaminhamento: ' . $exception->getMessage());
        }
    }

    public function listar_fichas_paciente($id)
    {
        $fichas = FichaAtendimento::where('atendimento_id', $id)->get();

        // return $fichas;

        return view('atendimentos.app_fichas_atendimentos', compact('fichas'));
    }

}

