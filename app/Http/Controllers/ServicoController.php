<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Servico;

class ServicoController extends Controller
{
    private $model;

    public function __construct(Servico $servico)
    {
        $this->model = $servico;
    }

    public function getAll()
    {
        $servicos = $this->model->all();

        if (count($servicos) == 0)
            return response()->json(['message' => 'nao existem servicos no sistema']);

        return response()->json($servicos);
    }

    public function getById($id)
    {
        $servico = $this->model->find($id);
        if ($servico == null)
            return response()->json(['message' => 'servico nao encontrado']);
        
        return response()->json($servico);
    }

    public function insert(Request $request)
    {
        $servico = Servico::create($request->all());

        return response()->json($servico);
    }

    public function update($id, Request $request)
    {
        $servico = $this->model->find($id)->update($request->all());
        if ($servico == null)
            return response()->json(['message' => 'nao foi possivel atualizar. Servico nao encontrado']);

        return response()->json($servico);
    }

    public function delete($id)
    {
        $servico = $this->model->find($id)->delete();
        if ($servico == null)
            return response()->json(['message' => 'nao foi possivel apagar. Servico nao encontrado']);

        return response()->json([]);
    }
}