<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTermsAccepted
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e aceitou os termos
        if (Auth::check() && !Auth::user()->terms_accepted) {
            // Redireciona para os termos
            return redirect()->route('terms.show');
        }

        return $next($request);
    }

}