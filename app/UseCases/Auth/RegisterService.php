<?php

namespace App\UseCases\Auth;

use App\Models\Subscribe;


class RegisterService
{

    public function verify($id): void
    {
        // dd($id);
        /** @var Subscribe $user */
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->verify();
    }
}
