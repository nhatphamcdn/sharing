<?php

namespace App\Http\Controllers\Api\Auth\Traits;

trait TraitCreateToken
{
    public function getToken($user, $device_name)
    {
        return $user->createToken($device_name)->plainTextToken;
    }
}