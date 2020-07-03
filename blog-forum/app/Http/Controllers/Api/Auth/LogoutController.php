<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke() {
        $request->user()->tokens()->delete();

        return response([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
