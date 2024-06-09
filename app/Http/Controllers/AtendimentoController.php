<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\AtendimentoPrimario; // Importe o modelo Atendimentos aqui
use App\Models\AtendimentoSecundario;
use App\Models\DadosBasicos;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        try{

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

            // dd($request->all());
            
            $request->validate($this->regras());


            $atendimento = $request->all();

            // dd($atendimento);

            list($dados_basicos, $atendimento_primario, $atendimento) = $this->getDadosAtendimentos($atendimento);

            // dd($atendimento_primario);
            
            if(isset($atendimento_primario['motivos']) and isset($atendimento_primario['motivos-descricao'])){

                foreach($atendimento_primario['motivos-descricao'] as $key => $valor){
                    if(!$valor){
                        unset($atendimento_primario['motivos-descricao'][$key]);
                    }
                }
                $atendimento_primario['motivos-descricao'] = array_values($atendimento_primario['motivos-descricao']);

                $motivosedescricao = array_combine(
                    array_values($atendimento_primario['motivos']), array_values($atendimento_primario['motivos-descricao']) );
                
    
    
                unset($atendimento_primario['motivos-descricao']);
                unset($atendimento_primario['motivos']);

                foreach($motivosedescricao as $motivo => $descricao){
                    $atendimento_primario[strtolower($motivo)] = 1;
                    $atendimento_primario[strtolower($motivo).'_descricao'] = $descricao;
                }
                
                
                
            }

            $primario=AtendimentoPrimario::create($atendimento_primario);

            // if(!empty($atendimento)){
                $secundario=AtendimentoSecundario::create($atendimento);

            // }

            
            $dadosbasicos=DadosBasicos::create($dados_basicos);

            $arr=['user_id'=>Auth::id(), 'tb_dados_basicos_id'=>$dadosbasicos->id,
            'tb_atendimento_primario_id'=>$primario->id ?? $dados_basicos->id, 
            'tb_atendimento_secundario_id'=>$secundario->id ?? $dados_basicos->id, 
            ];

            // dd($arr);

            Atendimento::create($arr);

            // Redirecionar para uma rota após salvar os dados (opcional)
            return redirect()->route('dashboard')->with('success', 'Dados salvos com sucesso!');
        } catch(\Exception $exception){dd($exception);}
    }

    public function renderizarView()
    {
        return view('formprimario');
    }

    public function listarAtendimentos(Request $request)    
    {
        
        $atendimentosids = Atendimento::all();
        $atendimentos=[];

        if($atendimentosids){
            
            foreach($atendimentosids as $atendimento){
                //linha da tabela com id, tb_dados_basicos_id, tb_atendimento_primario_id, tb_atendimento_secundario_id, encaminhamento
                $atendimento = $atendimento->toArray();

                $dados_basicos=DadosBasicos::find($atendimento['tb_dados_basicos_id'])->toArray();
                $dados_primario=AtendimentoPrimario::find($atendimento['tb_atendimento_primario_id'])->toArray();
                $dados_secundario=AtendimentoSecundario::find($atendimento['tb_atendimento_secundario_id'])->toArray();

                $user = Auth::user();
                
                $user=User::find($atendimento['user_id']);

                $responsavel = $user ? $user->name : 'N/A';
                $atendimentos[]=array_merge($dados_basicos, $dados_primario, $dados_secundario, ['responsavel'=>$user->name, 'atendimento_id'=>$atendimento['id']]);

            } 
        }
        $search = $request->input('search');
        if(isset($search)) {
            $atendimentos_filtrados = [];
            foreach($atendimentos as $atendimento){
                if(str_contains($atendimento['nome'], $search) or str_contains($atendimento['cartao_sus'], $search)) {
                    $atendimentos_filtrados[] = $atendimento;
                }
            } 
            $atendimentos = $atendimentos_filtrados;
        }
        return view('dashboard', ['atendimentos' => $atendimentos]);

    }

    public function encaminhar(Request $request)    
    {
        // Validação dos dados do formulário de encaminhamento
    
        // Obtendo o atendimento pelo ID
        $atendimento = Atendimento::findOrFail($request->atendimento_id);
        // Atualizando a coluna encaminhamento
        $atendimento->encaminhamento = $request->encaminhamento;
        $atendimento->save();
    
        return redirect()->back();
    }

}

