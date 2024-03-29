<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Autenticação do usuário e geração de token.
     *
     * @param  \App\Http\Requests\Api\AuthRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth(AuthRequest $request)
    {
        // Busca o usuário pelo e-mail fornecido
        $user = User::where('email', $request->email)->first();
        
        // Verifica se o usuário existe e se a senha está correta
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Se as credenciais forem inválidas, lança uma exceção de validação
            throw ValidationException::withMessages([
                'email' => ['As credenciais são inválidas']
            ]);
        }
        
        // Realiza logout em outros dispositivos, caso existam
        $user->tokens()->delete();

        // Cria um novo token para o usuário e o retorna como resposta
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    /**
     * Realiza logout do usuário, revogando todos os tokens de acesso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Realiza logout do usuário, revogando todos os tokens de acesso
        $request->user()->tokens()->delete();

        // Retorna uma resposta indicando sucesso
        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Retorna os detalhes do usuário autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        // Obtém o usuário autenticado
        $user = $request->user();

        // Retorna os detalhes do usuário como resposta
        return response()->json([
            'me' => $user
        ]);
    }
}
