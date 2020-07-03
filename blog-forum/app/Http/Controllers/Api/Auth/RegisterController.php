<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\Auth\Traits\TraitCreateToken;
use App\User;

class RegisterController extends Controller
{
    use TraitCreateToken;

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function __invoke(RegisterRequest $request) {
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(!$request->device_name) $request->device_name = 'browser';
        
        $message = 'Register success.';
        $token = $this->getToken($user, $request->device_name);
        return new UserResource($user, $message, $token);
    }
}
