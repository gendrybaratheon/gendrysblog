<?php

namespace App\Http\Transformers;

use App\User;
use League\Fractal;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transformer(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}