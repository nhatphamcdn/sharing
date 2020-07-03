<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\User;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Controllers\Api\Auth\Traits\TraitCreateToken;

class LoginController extends Controller
{
    use TraitCreateToken;

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function __invoke(LoginRequest $request) {
        $user = $this->user->where('email', $request->email)->first();

        if(!$request->device_name) $request->device_name = 'browser';

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $message = 'Login success.';
        $token = $this->getToken($user, $request->device_name);
        return new UserResource($user, $message, $token);
    }
}
