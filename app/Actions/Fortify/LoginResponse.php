<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        $redirectTo = match ($user->role) {
            'admin' => '/admin/dashboard',
            'vendeur' => '/vendeur/dashboard',
            default => '/',
        };

        return redirect()->intended($redirectTo);
    }
}
