<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Termos de Uso</title>
  <!-- Adicionando Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="py-4 mb-6 border-2 border-gray-300 shadow-md" style="background-color: #186f65;">
    <h1 class="text-2xl font-bold text-center text-white">Termos de Uso</h1>
  </div>
  
  <div class="max-w-4xl mx-auto py-8 px-4">
    <!-- 1º Tópico: Uso do Sistema -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>1. Uso do Sistema</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">1.1. O SRF destina-se ao uso exclusivo de profissionais de saúde e administradores autorizados para referenciamento e acompanhamento de pacientes.</p>
        <p class="mb-4">1.2. Você concorda em utilizar o SRF de acordo com as leis aplicáveis e em conformidade com estes Termos de Uso.</p>
      </div>
    </div>

    <!-- 2º Tópico: Cadastro e Conta de Usuário -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>2. Cadastro e Conta de Usuário</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">2.1. Você pode ser obrigado a se cadastrar para acessar certas partes do SRF. Ao se cadastrar, você concorda em fornecer informações precisas, atualizadas e completas.</p>
        <p class="mb-4">2.2. Você é responsável por manter a confidencialidade de suas credenciais de acesso e por todas as atividades que ocorrerem sob sua conta.</p>
      </div>
    </div>

    <!-- 3º Tópico: Responsabilidades do Usuário -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>3. Responsabilidades do Usuário</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">3.1. Você concorda em não utilizar o SRF de qualquer forma que possa danificar, desativar, sobrecarregar ou prejudicar o sistema ou interferir no uso e aproveitamento de outros usuários.</p>
        <p class="mb-4">3.2. Você concorda em não utilizar o SRF para coletar, armazenar ou transmitir qualquer informação ou dados pessoais de terceiros sem autorização adequada.</p>
      </div>
    </div>

    <!-- 4º Tópico: Propriedade Intelectual -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>4. Propriedade Intelectual</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">4.1. Todos os direitos de propriedade intelectual relacionados ao SRF e seu conteúdo são de propriedade exclusiva do desenvolvedor ou de seus licenciadores.</p>
        <p class="mb-4">4.2. Você concorda em não reproduzir, distribuir, modificar, exibir, executar ou utilizar de qualquer outra forma o SRF ou seu conteúdo sem autorização prévia por escrito.</p>
      </div>
    </div>

    <!-- 5º Tópico: Limitação de Responsabilidade -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>5. Limitação de Responsabilidade</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">5.1. O uso do SRF é por sua conta e risco. O desenvolvedor não será responsável por quaisquer danos diretos, indiretos, incidentais, especiais ou consequentes resultantes do uso ou incapacidade de utilizar o SRF.</p>
      </div>
    </div>

    <!-- 6º Tópico: Modificações nos Termos de Uso -->
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>6. Modificações nos Termos de Uso</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">6.1. O desenvolvedor reserva-se o direito de, a qualquer momento, modificar ou substituir estes Termos de Uso. O uso contínuo do SRF após tais modificações constitui aceitação dos novos Termos de Uso.</p>
      </div>
    </div>

    <!-- 7º Tópico: Rescisão -->
    
    <div class="border-b border-gray-300 mb-6">
      <h2 class="text-lg font-bold mb-2"><strong>7. Rescisão</strong></h2>
      <div class="grid grid-cols-1 gap-4">
        <p class="mb-4">7.1. O desenvolvedor pode rescindir ou suspender seu acesso ao SRF imediatamente, sem aviso prévio ou responsabilidade, por qualquer motivo, incluindo, sem limitação, violação destes Termos de Uso.</p>
      </div>
    </div>

    <div class="flex justify-center">
      <form method="POST" action="{{route('terms.declineTerms')}}">
        @csrf
        <button type="submit" class="icon bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg mr-4" style="background-color: #ef4444; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Cancelar</button>
      </form>
      <form method="POST" action="{{route('terms.accept')}}">
        @csrf
        <button type="submit" class="icon bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg" style="background-color: #186f65; box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.5);">Aceitar</button>
      </form>
    </div>
   

  </div> <!-- Fechamento da div max-w-4xl -->

  <script>
    // Adicione aqui qualquer script necessário para processar a aceitação dos termos
  </script>
</body>
</html>
