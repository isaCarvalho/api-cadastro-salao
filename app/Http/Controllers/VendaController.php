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

        if (count($vendas) > 0)
            return response()->json($vendas);
        else
            return response()->json([]);
    }

    public function getById($id)
    {
        $venda = $this->model->find($id);
        
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

        return response()->json($venda);
    }

    public function delete($id)
    {
        $venda = $this->model->find($id)->delete();

        return response()->json([]);
    }
}