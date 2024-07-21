<form action="/ficha_atendimento" method="POST">
    @csrf

    <input type="hidden" name="tipo_ficha" value="Primário">

    {{-- <input type="text" name="atendimento_id" value="{{$atendimento['id']}}"> --}}


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
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_movase" name="atividades" value="Mova_se" onfocus="this.blur()" required>
                    <span class="ml-2">CAMINHADA</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_mdms" name="atividades" value="Menos_dor_mais_saude" onfocus="this.blur()" required>
                    <span class="ml-2"> PILATES, MUSCULAÇÃO , FUNCIONAL</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_peso" name="atividades" value="Peso_saudavel" onfocus="this.blur()" required>
                    <span class="ml-2">Modalidade esportiva</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_nda" name="atividades" value="NDA" onfocus="this.blur()" required>
                    <span class="ml-2">Não participa de nenhuma atividade ou grupo</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="atividade_geracao" name="atividades" value="Geracao_esporte" onfocus="this.blur()" required>
                    <span class="ml-2">Outras</span>
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
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_movase" name="atividades_passadas" value="Mova_se_RA" onfocus="this.blur()" required>
                    <span class="ml-2">CAMINHADA</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_mdms" name="atividades_passadas" value="Mais_saude_RA" onfocus="this.blur()" required>
                    <span class="ml-2"> PILATES, MUSCULAÇÃO , FUNCIONAL</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_peso" name="atividades_passadas" value="Peso_saudavel_RA" onfocus="this.blur()" required>
                    <span class="ml-2">Modalidade esportiva</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_npa" name="atividades_passadas" value="NDA_RA" onfocus="this.blur()" required>
                    <span class="ml-2">Nunca participou das atividades ou grupos acima</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="passadas_geracao" name="atividades_passadas" value="Geracao_esporte_RA" onfocus="this.blur()" required>
                    <span class="ml-2">Outras</span>
                </label>


            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" id="btnNext" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Salvar</button>
    </div>
</form>
