<!-- 5º tópico: Atenção Secundária -->
<div class="border-b border-gray-300 mb-6">
<h2 class="text-lg font-bold mb-2">Sessão exclusiva para atenção secundária</h2>
<div class="mb-6">
  <label class="block text-sm font-bold" for="condicao_funcional">Condição funcional atual do paciente:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="funcional_condicao" id="condicao-funcional-sec" placeholder="Digite a condição funcional do paciente"></textarea>
</div>
<div class="mb-6">
  <label class="block text-sm font-bold" for="tratamento_ofertado">Tratamento ofertado:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tratamento_ofertado" id="fatores-ambientais-sec" placeholder="Digite os fatores ambientais e pessoais"></textarea>
</div>
<div class="mb-6">
  <label class="block text-sm font-bold" for="evolucao_funcional">Evolução funcional do usuário desde o início:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="evolucao_funcional" id="diagnostico-fisioterapeutico-sec" placeholder="Digite o diagnóstico fisioterapêutico"></textarea>
</div>
</div>

<!-- 6º tópico: Sessões Realizadas -->
<div class="border-b border-gray-300 mb-6">
<h2 class="block text-sm font-bold">Número de sessões realizadas:</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  <div class="grid grid-cols-1 gap-4">
    <label class="flex items-center">
      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_menos_de_10" name="sessoes" value="Menos_de_10" onfocus="this.blur()">
      <span class="ml-2">Menos de 10</span>
    </label>
    
    <label class="flex items-center">
      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_10_20" name="sessoes" value="10_à_20" onfocus="this.blur()">
      <span class="ml-2">10-20</span>
    </label>
    
    <label class="flex items-center">
      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_20_30" name="sessoes" value="20_à_30" onfocus="this.blur()">
      <span class="ml-2">20-30</span>
    </label>
    
    <label class="flex items-center">
      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-500 shadow-md" id="sessoes_mais_de_30" name="sessoes" value="Mais_de_30" onfocus="this.blur()">
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
      <input type="radio" class="form-radio h-5 w-5 text-blue-500" id="assiduo_check" name="assiduidade" value="assiduo" onfocus="this.blur()">
      <span class="ml-2">Assíduo</span>
    </label>
    <label class="inline-flex items-center">
      <input type="radio" class="form-radio h-5 w-5 text-blue-500" id="nao_assiduo_check" name="assiduidade" value="nao_assiduo" onfocus="this.blur()">
      <span class="ml-2">Não assíduo</span>
    </label>
  </div>
</div>

<!-- 8º tópico: Fatores Ambientais e Pessoais -->

<div class="border-b border-gray-300 mb-6">
<div class="mb-6">
  <label class="block text-sm font-bold" for="ambientais_pessoais">Fatores ambientais e pessoais:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fatores_sec" name="ambientais_pessoais" id="fatores-ambientais-pessoais" placeholder="Digite os fatores ambientais e pessoais"></textarea>
</div>
<div class="mb-6">
  <label class="block text-sm font-bold" for="diagnostico_fisioterapeutico">Diagnóstico fisioterapêutico:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="diagnostico_sec" name="diagnostico_fisio" id="diagnostico-fisioterapeutico" placeholder="Digite o diagnóstico fisioterapêutico"></textarea>
</div>
<div class="mb-6">
  <label class="block text-sm font-bold" for="criterios">Critérios para alta fisioterapêutica do setor secundário:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="criterios_sec" name="criterios" id="criterios" placeholder="Digite os critérios para alta fisioterapêutica"></textarea>
</div>
<div class="mb-6">
  <label class="block text-sm font-bold" for="justificativa">Justificativa para contrarreferência para a APS:</label>
  <textarea class="shadow appearance-none border rounded w-3/4 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="justificativa_sec" name="justificativa" id="justificativa" placeholder="Digite a justificativa da contrarreferência para a APS"></textarea>
</div>
</div>