<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Lista de Atendimentos') }}
        </h2>
    </x-slot>


    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Fichas de Atendimento</h1>

        <!-- Tabela para listar as fichas de atendimento -->
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Tipo de Ficha</th>
                    <th class="py-2 px-4 border-b">Condição Funcional</th>
                    <th class="py-2 px-4 border-b">Tratamento Ofertado</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fichas as $ficha)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $ficha->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $ficha->tipo_ficha }}</td>
                    <td class="py-2 px-4 border-b">{{ $ficha->funcional_condicao ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $ficha->tratamento_ofertado ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" data-toggle="modal" data-target="#viewFichaModal{{ $ficha->id }}">
                            Visualizar
                        </button>
                        <!-- Modals for viewing details -->
                        <div class="modal fade" id="viewFichaModal{{ $ficha->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFichaModalLabel{{ $ficha->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewFichaModalLabel{{ $ficha->id }}">Ficha de Atendimento - ID: {{ $ficha->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if($ficha->tipo_ficha == 'Primário')
                                            <!-- Campos para atenção primária -->
                                            <p><strong>Tipo de Ficha:</strong> Primário</p>
                                            <p><strong>Motivos:</strong> {{ implode(', ', $ficha->motivos ?? []) }}</p>
                                            <p><strong>Descrição dos Motivos:</strong> {{ $ficha->motivos_descricao }}</p>
                                            <p><strong>Queixa:</strong> {{ $ficha->queixa }}</p>
                                            <p><strong>Achados do Exame Físico:</strong> {{ $ficha->achados_exame_fisico }}</p>
                                            <p><strong>Testes Padronizados:</strong> {{ $ficha->testes_padronizados }}</p>
                                            <p><strong>Condição Funcional:</strong> {{ $ficha->condicao_funcional }}</p>
                                            <p><strong>Fatores Ambientais e Pessoais:</strong> {{ $ficha->fatores_ambientais }}</p>
                                            <p><strong>Diagnóstico Fisioterapêutico:</strong> {{ $ficha->diagnostico_fisioterapeutico }}</p>
                                            <p><strong>Atividades:</strong> {{ implode(', ', $ficha->atividades ?? []) }}</p>
                                            <p><strong>Atividades Passadas:</strong> {{ implode(', ', $ficha->atividades_passadas ?? []) }}</p>
                                        @elseif($ficha->tipo_ficha == 'Secundário')
                                            <!-- Campos para atenção secundária -->
                                            <p><strong>Tipo de Ficha:</strong> Secundário</p>
                                            <p><strong>Condição Funcional:</strong> {{ $ficha->funcional_condicao }}</p>
                                            <p><strong>Tratamento Ofertado:</strong> {{ $ficha->tratamento_ofertado }}</p>
                                            <p><strong>Evolução Funcional:</strong> {{ $ficha->evolucao_funcional }}</p>
                                            <p><strong>Sessões:</strong> {{ implode(', ', $ficha->sessoes ?? []) }}</p>
                                            <p><strong>Assiduidade:</strong> {{ $ficha->assiduidade }}</p>
                                            <p><strong>Fatores Ambientais e Pessoais:</strong> {{ $ficha->ambientais_pessoais }}</p>
                                            <p><strong>Diagnóstico Fisioterapêutico:</strong> {{ $ficha->diagnostico_fisio }}</p>
                                            <p><strong>Critérios:</strong> {{ $ficha->criterios }}</p>
                                            <p><strong>Justificativa:</strong> {{ $ficha->justificativa }}</p>
                                        @endif
                                        <p><strong>Criado em:</strong> {{ $ficha->created_at }}</p>
                                        <p><strong>Atualizado em:</strong> {{ $ficha->updated_at }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-app-layout>
