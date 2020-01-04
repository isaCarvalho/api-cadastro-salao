<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Funcionario;

class FuncionarioController extends Controller
{
    public function authenticate(Request $request)
    {
        try
        {
            $this->validate($request, [
                'email' => 'required|email',
                'senha' => 'required'
            ]);

            $funcionario = Funcionario::where('email', $request->input('email'))->first();

            if ($funcionario == null)
                return response()->json(['message', 'email incorreto!']);

            if ($request->input('senha') == $funcionario->password)
            {
                return response()->json([
                    'message' => 'usuario logado com sucesso',
                    'email' => $funcionario->email,
                    'senha' => $funcionario->password,
                    'nome' => $funcionario->name
                ]);
            }

            return response()->json(['message' => 'senha incorreta!']);
        } 
        catch(ValidationException $e)
        {
            return response()->json(['erro' => 'erro ao validar os dados']);
        }
    }
}