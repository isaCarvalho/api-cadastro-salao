<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Venda;

class VendaController extends Controller
{
    private $model;

    public function __construct(Venda $venda)
    {
        $this->model = $venda;
    }

    public function getAll()
    {
        $vendas = $this->model->all();

        if (count($vendas) == 0)
            return response()->json(['message' => 'nao existem vendas no sistema']);
        
        return response()->json($vendas);
    }

    public function getById($id)
    {
        $venda = $this->model->find($id);
        if ($venda == null)
            return response()->json(['message' => 'venda nao encontrada']);
        
        return response()->json($venda);
    }

    public function insert(Request $request)
    {
        $venda = Venda::create($request->all());

        return response()->json($venda);
    }

    public function update($id, Request $request)
    {
        $venda = $this->model->find($id)->update($request->all());
        if ($venda == null)
            return response()->json(['message' => 'nao foi possivel atualizar. Venda nao encontrada']);

        return response()->json($venda);
    }

    public function delete($id)
    {
        $venda = $this->model->find($id)->delete();
        if ($venda == null)
            return response()->json(['message' => 'nao foi possivel excluir. Venda nao encontrada']);

        return response()->json([]);
    }
}