
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
                @foreach($historicos as $historico)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $historico->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $historico->tipo_ficha }}</td>
                    <td class="py-2 px-4 border-b">{{ $historico->funcional_condicao ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $historico->tratamento_ofertado ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" data-toggle="modal" data-target="#viewFichaModal{{ $historico->id }}">
                            Visualizar
                        </button>
                        <!-- Modals for viewing details -->
                        <div class="modal fade" id="viewFichaModal{{ $historico->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFichaModalLabel{{ $historico->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewFichaModalLabel{{ $historico->id }}">Ficha de Atendimento - ID: {{ $historico->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if($historico->tipo_ficha == 'Primário')
                                            <!-- Campos para atenção primária -->
                                            <p><strong>Tipo de Ficha:</strong> Primário</p>
                                            <p><strong>Motivos:</strong> {{ implode(', ', $historico->motivos ?? []) }}</p>
                                            <p><strong>Descrição dos Motivos:</strong> {{ $historico->motivos_descricao }}</p>
                                            <p><strong>Queixa:</strong> {{ $historico->queixa }}</p>
                                            <p><strong>Achados do Exame Físico:</strong> {{ $historico->achados_exame_fisico }}</p>
                                            <p><strong>Testes Padronizados:</strong> {{ $historico->testes_padronizados }}</p>
                                            <p><strong>Condição Funcional:</strong> {{ $historico->condicao_funcional }}</p>
                                            <p><strong>Fatores Ambientais e Pessoais:</strong> {{ $historico->fatores_ambientais }}</p>
                                            <p><strong>Diagnóstico Fisioterapêutico:</strong> {{ $historico->diagnostico_fisioterapeutico }}</p>
                                            <p><strong>Atividades:</strong> {{ implode(', ', $historico->atividades ?? []) }}</p>
                                            <p><strong>Atividades Passadas:</strong> {{ implode(', ', $historico->atividades_passadas ?? []) }}</p>
                                        @elseif($historico->tipo_ficha == 'Secundário')
                                            <!-- Campos para atenção secundária -->
                                            <p><strong>Tipo de Ficha:</strong> Secundário</p>
                                            <p><strong>Condição Funcional:</strong> {{ $historico->funcional_condicao }}</p>
                                            <p><strong>Tratamento Ofertado:</strong> {{ $historico->tratamento_ofertado }}</p>
                                            <p><strong>Evolução Funcional:</strong> {{ $historico->evolucao_funcional }}</p>
                                            <p><strong>Sessões:</strong> {{ implode(', ', $historico->sessoes ?? []) }}</p>
                                            <p><strong>Assiduidade:</strong> {{ $historico->assiduidade }}</p>
                                            <p><strong>Fatores Ambientais e Pessoais:</strong> {{ $historico->ambientais_pessoais }}</p>
                                            <p><strong>Diagnóstico Fisioterapêutico:</strong> {{ $historico->diagnostico_fisio }}</p>
                                            <p><strong>Critérios:</strong> {{ $historico->criterios }}</p>
                                            <p><strong>Justificativa:</strong> {{ $historico->justificativa }}</p>
                                        @endif
                                        <p><strong>Criado em:</strong> {{ $historico->created_at }}</p>
                                        <p><strong>Atualizado em:</strong> {{ $historico->updated_at }}</p>
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
