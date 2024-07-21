

  <div class="modal fade" id="modalNovoPaciente" tabindex="-1" role="dialog" aria-labelledby="modalNovoPacienteLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="min-width: 62%;" role="document"> <!-- Definindo uma largura mínima de 90% -->
            <div class="modal-content">
                <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


                <div class="max-w-4xl mx-auto py-8 px-4">
                  <form action="{{route('SalvarDados')}}" method="post">
                      @csrf

                      <!-- ///////////////////////////////////////////////////////////////////////////////////-->


                        @include('formoutros')

                      <!-- Botões de salvar e cancelar -->
                      <div class="flex justify-end mt-4">
                        <button type="button" id="btnCancelar" class=" icon bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg mr-4" style="background-color: #ef4444; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Cancelar</button>
                        <button type="submit" class=" icon bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Salvar</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
      </div>
  </div> <!-- Fechamento da div max-w-4xl -->

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
    // Adicionando um evento de clique ao botão "Cancelar"
    document.getElementById('btnCancelar').addEventListener('click', function() {
      // Oculta o modal
      document.getElementById('modalNovoPaciente').style.display = 'none';
      // Remove o backdrop
      var backdrop = document.querySelector('.modal-backdrop');
      if (backdrop) {
        console.log(backdrop)
        // backdrop.classList.remove
        const body=document.getElementById('app-body');
        body.classList.remove('modal-open');
        body.removeChild(backdrop);
      }

    });

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

