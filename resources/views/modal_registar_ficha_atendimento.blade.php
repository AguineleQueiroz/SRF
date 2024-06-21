

<div class="modal fade" id="modalAddNovaFichaAtendimento" tabindex="-1" role="dialog" aria-labelledby="modalNovoPacienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width: 62%;" role="document"> <!-- Definindo uma largura mínima de 90% -->
          <div class="modal-content">
              <div class="modal-body">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>

@php
$user = Auth::user();
echo $atendimento['id'];
@endphp



@if($user->attention_type == 'Primário')


<form action="/ficha_atendimento" method="POST">
    @csrf

    @php
        $user = Auth::user();
        echo $atendimento['id'];
    @endphp

    <input type="hidden" name="tipo_ficha" value="Primário">

    <input type="hidden" name="atendimento_id" value="{{$atendimento['id']}}">
    <input type="hidden" name="user_id" value="{{$user->id}}">


    <!-- 5º tópico: Atenção Primária -->
    <div class="border-b border-gray-300 mb-6">
        <h2 class="text-lg font-bold mb-2">Sessão exclusiva para atenção primária</h2>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-4">Motivos que levaram o paciente a procurar o serviço de saúde:</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Motivos -->
                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="dor" onchange="toggleField(this)" data-target="dor" onfocus="this.blur()" id="dor">
                        <span class="ml-2">Dor</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="dor_descricao" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md " name="motivos[]" value="incapacidade" onchange="toggleField(this)" data-target="avds" onfocus="this.blur()" id="incapacidade">
                        <span class="ml-2">Incapacidade de realizar AVDS</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="avds" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-osteomusculares" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="osteomusculares" onchange="toggleField(this)" data-target="osteomusculares" onfocus="this.blur()">
                        <span class="ml-2">Condições osteomusculares</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="osteomusculares" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-neurologicas" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="neurologicas" onchange="toggleField(this)" data-target="neurologicas" onfocus="this.blur()">
                        <span class="ml-2">Condições neurológicas</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="neurologicas" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-uroginecologicas" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="uroginecologicas" onchange="toggleField(this)" data-target="uroginecologicas" onfocus="this.blur()">
                        <span class="ml-2">Condições uroginecológicas</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="uroginecologicas" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-cardiovasculares" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="cardiovasculares" onchange="toggleField(this)" data-target="cardiovasculares" onfocus="this.blur()">
                        <span class="ml-2">Condições cardiovasculares</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="cardiovasculares" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-respiratorias" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="respiratorias" onchange="toggleField(this)" data-target="respiratorias" onfocus="this.blur()">
                        <span class="ml-2">Condições respiratórias</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="respiratorias" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-oncologicas" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="oncologicas" onchange="toggleField(this)" data-target="oncologicas" onfocus="this.blur()">
                        <span class="ml-2">Condições oncológicas</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="oncologicas" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-pediatria" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="pediatria" onchange="toggleField(this)" data-target="pediatria" onfocus="this.blur()">
                        <span class="ml-2">Pediatria</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="pediatria" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>

                    <label for="motivos" class="flex items-center">
                        <input type="checkbox" id="motivos-deficiencias" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" name="motivos[]" value="multiplas" onchange="toggleField(this)" data-target="deficiencias" onfocus="this.blur()">
                        <span class="ml-2">Deficiências múltiplas</span>
                    </label>
                    <label for="motivos-descricao" class="hidden"></label>
                    <textarea name="motivos-descricao[]" id="deficiencias" class="hidden shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-y" placeholder="Explique o motivo"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- 6º tópico: Avaliação Fisioterapêutica -->
    <div class="border-b border-gray-300 mb-6">
        <div class="mb-6">
            <label class="block text-sm font-bold" for="queixa">Queixa do paciente:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="queixa" id="queixa" placeholder="Digite a queixa do paciente" required></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="achados_exame_fisico">Principais achados do Exame Físico:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="achados_exame_fisico" id="achados-exame-fisico" placeholder="Digite os achados do exame físico" required></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="testes_padronizados">Testes padronizados realizados:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="testes_padronizados" id="testes-padronizados" placeholder="Digite os testes realizados" required></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="condicao_funcional">Condição funcional do paciente:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="condicao_funcional" id="condicao-funcional" placeholder="Digite a condição funcional do paciente" required></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="fatores_ambientais">Fatores ambientais e pessoais:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="fatores_ambientais" id="fatores-ambientais" placeholder="Digite os fatores ambientais e pessoais" required></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="diagnostico_fisioterapeutico">Diagnóstico Fisioterapêutico:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="diagnostico_fisioterapeutico" id="diagnostico-fisioterapeutico" placeholder="Digite o diagnóstico fisioterapêutico" required></textarea>
        </div>
    </div>

    <!-- 7º tópico: Atividades ou grupos operativos -->
    <div class="border-b border-gray-300 mb-6">
        <h2 class="text-lg font-bold mb-4">Atividades ou grupos operativos dos quais o usuário participa:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-1 gap-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_movase" name="atividades" value="Mova_se" onfocus="this.blur()">
                    <span class="ml-2">Grupo de caminhada MOVA-SE</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_mdms" name="atividades" value="Menos_dor_mais_saude" onfocus="this.blur()">
                    <span class="ml-2">Grupo de dor crônica Menos dor mais saúde</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_peso" name="atividades" value="Peso_saudavel" onfocus="this.blur()">
                    <span class="ml-2">Grupo funcional peso saudável</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_geracao" name="atividades" value="Geracao_esporte" onfocus="this.blur()">
                    <span class="ml-2">Geração Esporte</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_nda" name="atividades" value="NDA" onfocus="this.blur()">
                    <span class="ml-2">Não participa de nenhuma atividade ou grupo</span>
                </label>
            </div>
        </div>
    </div>

    <!-- 8º tópico: Atividades ou grupos operativos dos quais o usuário já participou -->
    <div class="border-b border-gray-300 mb-6">
        <h2 class="text-lg font-bold mb-4">Atividades ou grupos operativos dos quais o usuário já participou:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-1 gap-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_movase" name="atividades_passadas" value="Mova_se_RA" onfocus="this.blur()">
                    <span class="ml-2">Grupo de caminhada MOVA-SE</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_mdms" name="atividades_passadas" value="Mais_saude_RA" onfocus="this.blur()">
                    <span class="ml-2">Grupo de dor crônica Menos dor mais saúde</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_peso" name="atividades_passadas" value="Peso_saudavel_RA" onfocus="this.blur()">
                    <span class="ml-2">Grupo funcional peso saudável</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_geracao" name="atividades_passadas" value="Geracao_esporte_RA" onfocus="this.blur()">
                    <span class="ml-2">Geração Esporte</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_npa" name="atividades_passadas" value="NDA_RA" onfocus="this.blur()">
                    <span class="ml-2">Nunca participou das atividades ou grupos acima</span>
                </label>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" id="btnNext" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Salvar</button>
    </div>
</form>



@elseif($user->attention_type == 'Secundário')


<form action="/ficha_atendimento" method="POST">
    @csrf

    <input type="hidden" name="tipo_ficha" value="Secundário">

    <input type="hidden" name="atendimento_id" value="{{$atendimento['id']}}">
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <!-- 5º tópico: Atenção Secundária -->
    <div class="border-b border-gray-300 mb-6">
        <h2 class="text-lg font-bold mb-2">Sessão exclusiva para atenção secundária</h2>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="condicao_funcional">Condição funcional atual do paciente:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="funcional_condicao" id="condicao-funcional-sec" placeholder="Digite a condição funcional do paciente" required>{{ old('funcional_condicao') }}</textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="tratamento_ofertado">Tratamento ofertado:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tratamento_ofertado" id="tratamento_ofertado_sec" placeholder="Digite o tratamento ofertado" required>{{ old('tratamento_ofertado') }}</textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="evolucao_funcional">Evolução funcional do usuário desde o início:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="evolucao_funcional" id="evolucao_funcional_sec" placeholder="Digite a evolução funcional do usuário" required>{{ old('evolucao_funcional') }}</textarea>
        </div>
    </div>

    <!-- 6º tópico: Sessões Realizadas -->
    <div class="border-b border-gray-300 mb-6">
        <h2 class="block text-sm font-bold">Número de sessões realizadas:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-1 gap-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_menos_de_10" name="sessoes[]" value="Menos_de_10" @if(is_array(old('sessoes')) && in_array('Menos_de_10', old('sessoes'))) checked @endif>
                    <span class="ml-2">Menos de 10</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_10_20" name="sessoes[]" value="10_à_20" @if(is_array(old('sessoes')) && in_array('10_à_20', old('sessoes'))) checked @endif>
                    <span class="ml-2">10-20</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_20_30" name="sessoes[]" value="20_à_30" @if(is_array(old('sessoes')) && in_array('20_à_30', old('sessoes'))) checked @endif>
                    <span class="ml-2">20-30</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_mais_de_30" name="sessoes[]" value="Mais_de_30" @if(is_array(old('sessoes')) && in_array('Mais_de_30', old('sessoes'))) checked @endif>
                    <span class="ml-2">Mais de 30</span>
                </label>
            </div>
        </div>
    </div>

    <!-- 7º tópico: Assiduidade do paciente -->
    <div class="mb-4">
        <label class="block text-sm font-bold">Assiduidade do paciente:</label>
        <div class="flex">
            <label class="inline-flex items-center mr-4">
                <input type="radio" class="form-radio h-5 w-5 text-blue-500" id="assiduo_check" name="assiduidade" value="assiduo" @if(old('assiduidade') == 'assiduo') checked @endif required>
                <span class="ml-2">Assíduo</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio h-5 w-5 text-blue-500" id="nao_assiduo_check" name="assiduidade" value="nao_assiduo" @if(old('assiduidade') == 'nao_assiduo') checked @endif required>
                <span class="ml-2">Não assíduo</span>
            </label>
        </div>
    </div>

    <!-- 8º tópico: Fatores Ambientais e Pessoais -->
    <div class="border-b border-gray-300 mb-6">
        <div class="mb-6">
            <label class="block text-sm font-bold" for="ambientais_pessoais">Fatores ambientais e pessoais:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fatores_sec" name="ambientais_pessoais" placeholder="Digite os fatores ambientais e pessoais" required>{{ old('ambientais_pessoais') }}</textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="diagnostico_fisioterapeutico">Diagnóstico fisioterapêutico:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="diagnostico_sec" name="diagnostico_fisio" placeholder="Digite o diagnóstico fisioterapêutico" required>{{ old('diagnostico_fisio') }}</textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="criterios">Critérios para alta fisioterapêutica do setor secundário:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="criterios_sec" name="criterios" placeholder="Digite os critérios para alta fisioterapêutica" required>{{ old('criterios') }}</textarea>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold" for="justificativa">Justificativa para contrarreferência para a APS:</label>
            <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="justificativa_sec" name="justificativa" placeholder="Digite a justificativa da contrarreferência para a APS" required>{{ old('justificativa') }}</textarea>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" id="btnNext" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);"> Salvar </button>
    </div>
</form>

<!-- Script para exibir mensagens de erro com SweetAlert -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            let errorMessages = `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `;

            Swal.fire({
                title: 'Erro de Validação',
                html: errorMessages,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>



@endif



