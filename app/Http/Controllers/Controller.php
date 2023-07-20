<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcomePage()
    {
        return view('pages.index');
    }

    public function dashboardPage()
    {
        return view('pages.dashboard');
    }

    protected function handleToken (){
        $user = User::find(Auth::user()->id);

        $payload = [
            'uuid' => $user->uuid,
            'username' => $user->username,
            'email' => $user->email
        ];

        $jwt = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        $user->token = $jwt;
        $user->save();
    }

    protected function clearToken(){
        $user = User::find(Auth::user()->id);
        $user->token = null;
        $user->save();
    }
}
