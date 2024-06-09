<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço de email e enviaremos um link de redefinição de senha que permitirá que você escolha uma nova senha.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4"> <!-- Modificado justify-end para justify-center -->
            <x-primary-button style="background-color: #186f65; height: 50px;">
                {{ __('Enviar link') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
