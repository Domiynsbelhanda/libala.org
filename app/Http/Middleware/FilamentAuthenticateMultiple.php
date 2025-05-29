<?php

namespace App\Http\Middleware;

use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Database\Eloquent\Model;

class FilamentAuthenticateMultiple extends Middleware
{
    protected function authenticate($request, array $guards): void
    {
        $guardsToTry = ['web', 'event_manager'];

        foreach ($guardsToTry as $guard) {
            if (auth()->guard($guard)->check()) {
                auth()->shouldUse($guard);

                $user = auth()->guard($guard)->user();

                $panel = Filament::getCurrentPanel();

                if ($user instanceof FilamentUser) {
                    abort_unless($user->canAccessPanel($panel), 403);
                } else {
                    // Si ce n'est pas un FilamentUser, on limite à l'environnement local
                    abort_if(config('app.env') !== 'local', 403);
                }

                return;
            }
        }

        // Aucun des guards n'est connecté
        $this->unauthenticated($request, $guardsToTry);
    }

    protected function redirectTo($request): ?string
    {
        return Filament::getLoginUrl() ?? route('event.login.form');
    }
}
