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

        if (count($pessoas) > 0)
            return response()->json($pessoas);
        else
            return response()->json([]);
    }

    public function getById($id)
    {
        $pessoa = $this->model->find($id);

        return response()->json($pessoa);
    }

    public function insert(Request $request)
    {
        $pessoa = Pessoa::create($request->all());

        return response()->json($pessoa);
    }

    public function update($id, Request $request)
    {
        $pessoa = $this->model->find($id)->update($request->all());

        return response()->json($pessoa);
    }

    public function delete($id)
    {
        $pessoa = $this->model->find($id)->delete();

        return response()->json([]);
    }
}
