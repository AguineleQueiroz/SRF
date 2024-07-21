<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Editar Dados') }}
        </h2>
    </x-slot>

        <div class="modal-dialog modal-lg" style="min-width: 62%;" role="document"> <!-- Definindo uma largura mínima de 90% -->


            <div class="modal-content">
                <div class="modal-body">

                <div class="max-w-4xl mx-auto py-8 px-4">
                  <form action="/atualizar_paciente/{{ $atendimentos[0]['id']}}" method="post">
                      @csrf

                      <!-- ///////////////////////////////////////////////////////////////////////////////////-->



                      <div class="border-b border-gray-300 mb-6">


                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="nome">Nome:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="nome" id="nome" type="text" placeholder="Digite seu nome"
                                       value="{{ $atendimentos[0]['nome'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="idade">Idade:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="idade" id="idade" type="text" placeholder="Digite sua idade"
                                       value="{{ $atendimentos[0]['idade'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold">Sexo:</label>
                                <div class="flex">
                                    <label class="inline-flex items-center mr-4">
                                        <input id="masculino" type="radio" class="form-radio h-5 w-5 text-blue-500" name="sexo" value="masculino" onfocus="this.blur()"
                                            {{ ($atendimentos[0]['sexo'] ?? '') === 'masculino' ? 'checked' : '' }}>
                                        <span class="ml-2">Masculino</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input id="feminino" type="radio" class="form-radio h-5 w-5 text-pink-500" name="sexo" value="feminino" onfocus="this.blur()"
                                            {{ ($atendimentos[0]['sexo'] ?? '') === 'feminino' ? 'checked' : '' }}>
                                        <span class="ml-2">Feminino</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="contato">Contato:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field"
                                       name="contato" id="contato" type="number" inputmode="numeric" pattern="[0-9]*" placeholder="Digite seu contato"
                                       value="{{ $atendimentos[0]['contato'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="data_nascimento">Data de Nascimento:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="data_nascimento" id="data-nascimento" type="date" placeholder="DD/MM/AAAA" required
                                       value="{{ $atendimentos[0]['data_nascimento'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="cartao_sus">Número de Cartão SUS:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field"
                                       name="cartao_sus" id="cartao-sus" type="number" placeholder="Digite o número do cartão SUS" maxlength="15" required
                                       value="{{ $atendimentos[0]['cartao_sus'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="cpf">Número de CPF:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input-field"
                                       name="cpf" id="cpf" type="text" placeholder="Digite o número do CPF" maxlength="15" required
                                       value="{{ $atendimentos[0]['cpf'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="endereco">Endereço:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="endereco" id="endereco" type="text" placeholder="Digite seu endereço"
                                       value="{{ $atendimentos[0]['endereco'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="data_cadastro">Data de Cadastro:</label>
                                <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="data_cadastro" id="data-cadastro" type="date" placeholder="DD/MM/AAAA" required
                                       value="{{ $atendimentos[0]['data_cadastro'] ?? '' }}">
                            </div>
                        </div>
                    </div>



                    <!-- 2º tópico: Unidade Básica de Saúde -->
                    <div class="border-b border-gray-300 mb-6">
                        <h2 class="text-lg font-bold mb-2">Unidade Básica de Saúde</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="ubs">Nome da UBS:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="ubs" id="ubs" type="text" placeholder="Digite o nome da UBS"
                                       value="{{ $atendimentos[0]['ubs'] ?? '' }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="acs">ACS responsável:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="acs" id="acs" type="text" placeholder="Digite o nome do ACS responsável"
                                       value="{{ $atendimentos[0]['acs'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- 3º tópico: Condições de Saúde -->
                    <div class="border-b border-gray-300 mb-6">
                        <h2 class="text-lg font-bold mb-2">Condições de Saúde</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-6">
                                <label class="block text-sm font-bold" for="diagnostico">Diagnóstico Clínico:</label>
                                <textarea class="shadow appearance-none border rounded w-full h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          name="diagnostico" id="diagnostico" placeholder="Digite o diagnóstico clínico" readonly>{{ $atendimentos[0]['diagnostico'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-bold" for="comorbidades">Comorbidades associadas:</label>
                                <textarea class="shadow appearance-none border rounded w-full h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          name="comorbidades" id="comorbidades" placeholder="Digite as comorbidades associadas" readonly>{{ $atendimentos[0]['comorbidades'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="ultima_internacao">Última internação:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="ultima_internacao" id="ultima-internacao" type="date" placeholder="DD/MM/AAAA"
                                       value="{{ $atendimentos[0]['ultima_internacao'] ?? '' }}" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold" for="medico_responsavel">Médico responsável:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="medico_responsavel" id="medico-responsavel" type="text" placeholder="Digite o nome do médico responsável"
                                       value="{{ $atendimentos[0]['medico_responsavel'] ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- 4º tópico: Nível de prioridade -->
                    <div class="mb-6 border-b border-gray-300">
                        <h2 class="text-lg font-bold mb-2">Nível de Prioridade</h2>
                        <div class="flex mb-4">
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" class="form-radio h-5 w-5 text-red-500" name="prioridade" id="alta" value="alta" disabled
                                       {{ ($atendimentos[0]['prioridade'] ?? '') === 'alta' ? 'checked' : '' }}>
                                <span class="ml-2 font-bold text-red-500">Alta Prioridade</span>
                            </label>
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" class="form-radio h-5 w-5 text-yellow-500" name="prioridade" id="media" value="media" disabled
                                       {{ ($atendimentos[0]['prioridade'] ?? '') === 'media' ? 'checked' : '' }}>
                                <span class="ml-2 font-bold text-yellow-500">Média Prioridade</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-green-500" name="prioridade" id="baixa" value="baixa" disabled
                                       {{ ($atendimentos[0]['prioridade'] ?? '') === 'baixa' ? 'checked' : '' }}>
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




                      <!-- ///////////////////////////////////////////////////////////////////////////////////-->

                      <!-- Botões de salvar e cancelar -->
                      <div class="flex justify-end mt-4">
                        <a href="{{route('dashboard')}}"id="btnCancelar" class=" icon bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg mr-4" style="background-color: #ef4444; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Cancelar</a>
                        <button type="submit" class=" icon bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Salvar</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
        </div>

  <style>

    /* Estilos para o campo de entrada */
    .input-field {
      /* Adicione seus estilos personalizados aqui, se necessário */
    }

    /* Ocultar as setinhas de aumento e redução */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield; /* Firefox */
    }

  </style>

  <script>

    function toggleField(checkbox) {
      var target = document.getElementById(checkbox.dataset.target);
      target.classList.toggle("hidden");
    }

    function toggleDetails(atendimentoId) {
        console.log(atendimentoId)
        const details = document.getElementById(`detalhes-${atendimentoId}`);
        details.classList.toggle('d-none')
    }

    // Função para permitir apenas números em um campo de entrada
    function allowOnlyNumbers(inputElement) {
    inputElement.addEventListener('keydown', function (event) {
        // Permitir teclas especiais como backspace, delete, setas de navegação, etc.
        if (event.key === 'Backspace' || event.key === 'Delete' || event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Tab') {
            return; // Permitir a tecla
        }

        // Verificar se a tecla pressionada é um número
        if (isNaN(parseInt(event.key))) {
            event.preventDefault(); // Impedir a entrada
        }
    });
  }
    // Aplicar a funcionalidade a todos os campos que precisam aceitar apenas números
    const idadeInput = document.getElementById('idade');
    allowOnlyNumbers(idadeInput);

    const contatoInput = document.getElementById('contato');
    allowOnlyNumbers(contatoInput);

    const cpfInput = document.getElementById('cpf');
    allowOnlyNumbers(cpfInput);

    const cartaoSusInput = document.getElementById('cartao_sus');
    allowOnlyNumbers(cartaoSusInput);

  </script>



</x-app-layout>
