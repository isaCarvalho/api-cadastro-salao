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
            return response()->json(['message' => 'nao existem servicos no sistema'], 404);

        return response()->json($servicos);
    }

    public function getById($id)
    {
        $servico = $this->model->find($id);
        if ($servico == null)
            return response()->json(['message' => 'servico nao encontrado'], 404);

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
            return response()->json(['message' => 'nao foi possivel atualizar. Servico nao encontrado'], 404);

        return response()->json($servico);
    }

    public function updatePrice()
    {
        $servicos = $this->model->all();
        if ($servicos == null)
            return response()->json(['message' => 'nao foi possivel atualizar. Servico nao encontrado'], 404);

        foreach ($servicos as $servico) {
            $servico->preco += 1;
            $servico->save();
        }

        return response()->json($servicos);
    }

    public function delete($id)
    {
        $servico = $this->model->find($id)->delete();
        if ($servico == null)
            return response()->json(['message' => 'nao foi possivel apagar. Servico nao encontrado'], 404);

        return response()->json([]);
    }
}
