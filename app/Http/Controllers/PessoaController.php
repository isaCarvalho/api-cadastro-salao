<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pessoa;

class PessoaController extends Controller
{
    private $model;

    public function __construct(Pessoa $pessoa)
    {
        $this->model = $pessoa;
    }

    public function getAll()
    {
        $pessoas = $this->model->all();

        if (count($pessoas) == 0)
            return response()->json(['message' => 'nao existem pessoas cadastradas no sistema'], 404);

        return response()->json($pessoas, 200);
    }

    public function getById($id)
    {
        $pessoa = $this->model->find($id);
        if ($pessoa == null)
            return response()->json(['message' => 'pessoa nao encontrada', 404]);

        return response()->json($pessoa, 200);
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'senha' => 'required'
        ], [
          'required' => 'O campo :attribute é obrigatório!'
        ]);

        $pessoa = Pessoa::create([
          "primeiro_nome" => $request["primeiro_nome"],
          "sobrenome" => $request["sobrenome"],
          "email" => $request["email"],
          "senha" => $request["senha"]
        ]);

        return response()->json($pessoa, 200);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'senha' => 'required'
        ]);

        $pessoa = $this->model->find($id)->update($request->all());
        if ($pessoa == null)
            return response()->json(['message' => 'nao foi possivel atualizar. Pessoa nao encontrada'], 404);

        return response()->json($pessoa, 200);
    }

    public function delete($id)
    {
        $pessoa = $this->model->find($id)->delete();

        return response()->json([], 200);
    }
}
