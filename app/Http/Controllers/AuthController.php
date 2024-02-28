<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
use HttpResponses;

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){  //isso daqui é para se caso a autorização der certo
            return $this->response('Authorized', 200, [
                'token' => $request->user()->createToken('invoice')->plainTextToken     //to criando um token, e o segundo param do create são suas abilities
            ]);
        }
        return $this->response('Not Authorized', 400);
        
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();       //função para excluir um token

        return $this->response('token Revoked', 200);
    }
}
