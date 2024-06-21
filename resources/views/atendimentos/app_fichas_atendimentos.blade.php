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
                <th class="py-2 px-4 border-b">Evolução Funcional</th>
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
                    {{-- <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded" data-toggle="modal" data-target="#editFichaModal{{ $ficha->id }}">
                        Editar
                    </button> --}}
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $ficha->id }}').submit();">
                        Eliminar
                    </button>
                    <form id="delete-form-{{ $ficha->id }}" action="{{ route('ficha_atendimento.destroy', $ficha->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <!-- Modals for viewing and editing details -->
                    <div class="modal fade" id="viewFichaModal{{ $ficha->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFichaModalLabel{{ $ficha->id }}" aria-hidden="true">
                        <!-- Existing modal content for viewing -->
                    </div>

                    <div class="modal fade" id="editFichaModal{{ $ficha->id }}" tabindex="-1" role="dialog" aria-labelledby="editFichaModalLabel{{ $ficha->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editFichaModalLabel{{ $ficha->id }}">Editar Ficha de Atendimento - ID: {{ $ficha->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulário de edição -->
                                    <form action="{{ route('ficha_atendimento.update', $ficha->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Campos de edição para cada tipo de ficha -->
                                        @if($ficha->tipo_ficha == 'Primário')
                                            <!-- Campos para atenção primária -->
                                            <div class="mb-6">
                                                <label class="block text-sm font-bold" for="motivos">Motivos:</label>
                                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="motivos" value="{{ implode(', ', $ficha->motivos ?? []) }}">
                                            </div>
                                            <div class="mb-6">
                                                <label class="block text-sm font-bold" for="motivos_descricao">Descrição dos Motivos:</label>
                                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="motivos_descricao" value="{{ is_array($ficha->motivos_descricao) ? implode(', ', $ficha->motivos_descricao) : $ficha->motivos_descricao }}">
                                            </div>
                                            <!-- Adicione os outros campos conforme necessário -->
                                        @elseif($ficha->tipo_ficha == 'Secundário')
                                            <!-- Campos para atenção secundária -->
                                            <div class="mb-6">
                                                <label class="block text-sm font-bold" for="condicao_funcional">Condição Funcional:</label>
                                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="condicao_funcional" value="{{ $ficha->funcional_condicao }}">
                                            </div>
                                            <div class="mb-6">
                                                <label class="block text-sm font-bold" for="tratamento_ofertado">Tratamento Ofertado:</label>
                                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tratamento_ofertado" value="{{ $ficha->tratamento_ofertado }}">
                                            </div>
                                            <!-- Adicione os outros campos conforme necessário -->
                                        @endif

                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg">Salvar Alterações</button>
                                        </div>
                                    </form>
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


