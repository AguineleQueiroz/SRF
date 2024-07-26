<div class="border-b border-gray-300 mb-6">
<h4 class="text-lg font-bold mb-3">Informações</h4>

    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4">
        <label class="block text-sm font-bold" for="nome">Nome:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nome" id="nome" type="text" placeholder="Digite seu nome" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold" for="idade">Idade:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="idade" id="idade" type="text" placeholder="Digite sua idade" required>
        </div>

        <div class="mb-4">
        <label class="block text-sm font-bold" for="contato">Contato:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field" name="contato" id="contato" type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Digite seu contato" required>
        </div>
        <div class="mb-4">
        <label class="block text-sm font-bold" for="data_nascimento">Data de Nascimento:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        name="data_nascimento" id="data-nascimento" type="date" placeholder="DD/MM/AAAA" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold" for="cpf">Número de CPF:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field"
            name="cpf" id="cartao-sus" type="text" placeholder="Digite o número do CPF" maxlength="15" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold" for="cartao_sus">Número de Cartão SUS:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field"
                   name="cartao_sus" id="cartao-sus" type="number" placeholder="Digite o número do cartão SUS"
                   min="1" max="15">
        </div>
        <div class="mb-4">
        <label class="block text-sm font-bold" for="endereco">Endereço:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="endereco" id="endereco" type="text" placeholder="Digite seu endereço" required>
        </div>
        <div class="mb-4">
        <label class="block text-sm font-bold" for="data_cadastro">Data de Cadastro:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        name="data_cadastro" id="data-cadastro" type="date" placeholder="DD/MM/AAAA" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold">Sexo:</label>
            <div class="flex">
                <label class="inline-flex items-center mr-4">
                    <input id="masculino" type="radio" class="form-radio h-5 w-5 text-blue-500" name="sexo" value="masculino" onfocus="this.blur()" required>
                    <span class="ml-2">Masculino</span>
                </label>
                <label class="inline-flex items-center">
                    <input id="feminino" type="radio" class="form-radio h-5 w-5 text-pink-500" name="sexo" value="feminino" onfocus="this.blur()" required>
                    <span class="ml-2">Feminino</span>
                </label>
            </div>
        </div>

    </div>

</div>

<!-- 2º tópico: Unidade Básica de Saúde -->
<div class="border-b border-gray-300 mb-6">
<h2 class="text-lg font-bold mb-2">Unidade Básica de Saúde</h2>
<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
    <label class="block text-sm font-bold" for="ubs">Nome da UBS:</label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="ubs" id="ubs" type="text" placeholder="Digite o nome da UBS" required>
    </div>
    <div class="mb-4">
    <label class="block text-sm font-bold" for="acs">ACS responsável:</label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    name="acs" id="acs" type="text" placeholder="Digite o nome do ACS responsável" required>
    </div>
</div>
</div>

<!-- 3º tópico: Condições de Saúde -->
<div class="border-b border-gray-300 mb-6">
<h2 class="text-lg font-bold mb-2">Condições de Saúde</h2>
<div class="grid grid-cols-2 gap-4">
    <div class="mb-6">
    <label class="block text-sm font-bold" for="diagnostico">Diagnóstico Clínico:</label>
    <textarea class="shadow appearance-none border rounded w-full h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="diagnostico" id="diagnostico" placeholder="Digite o diagnóstico clínico" required></textarea>
    </div>
    <div class="mb-6">
    <label class="block text-sm font-bold" for="comorbidades">Comorbidades associadas:</label>
    <textarea class="shadow appearance-none border rounded w-full h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="comorbidades" id="comorbidades" placeholder="Digite as comorbidades associadas" required></textarea>
    </div>
    <div class="mb-4">
    <label class="block text-sm font-bold" for="ultima_internacao">Última internação:</label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="ultima_internacao" id="ultima-internacao" type="date" placeholder="DD/MM/AAAA">
    </div>
    <div class="mb-4">
    <label class="block text-sm font-bold" for="medico_responsavel">Médico responsável:</label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    name="medico_responsavel" id="medico-responsavel" type="text" placeholder="Digite o nome do médico responsável" required>
    </div>
</div>
</div>

<!-- 4º tópico: Nível de prioridade -->
<div class="mb-6 border-b border-gray-300">
<h2 class="text-lg font-bold mb-2">Nível de Prioridade</h2>
<div class="flex mb-4">
    <label class="inline-flex items-center mr-4">
    <input type="radio" class="form-radio h-5 w-5 text-red-500" name="prioridade" id="alta" value="alta" onfocus="this.blur()" required>
    <span class="ml-2 font-bold text-red-500">Alta Prioridade</span>
    </label>
    <label class="inline-flex items-center mr-4">
    <input type="radio" class="form-radio h-5 w-5 text-yellow-500" name="prioridade" id="media" value="media" onfocus="this.blur()" required>
    <span class="ml-2 font-bold text-yellow-500">Média Prioridade</span>
    </label>
    <label class="inline-flex items-center">
    <input type="radio" class="form-radio h-5 w-5 text-green-500" name="prioridade" id="baixa" value="baixa" onfocus="this.blur()" required>
    <span class="ml-2 font-bold text-green-500">Baixa Prioridade</span>
    </label>
</div>
</div>

<script>
    // Seleciona o elemento input
    var inputCartaoSus = document.getElementById('cartao-sus');

    // Adiciona um evento de escuta para o evento input
    inputCartaoSus.addEventListener('input', function () {
        // Se o comprimento do valor for maior que 15, define o valor cortado em 15 caracteres
        if (this.value.length > 15) {
            this.value = this.value.slice(0, 15);
        }
    });
</script>
