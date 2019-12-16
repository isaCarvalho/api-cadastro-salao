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

        if (count($servicos) > 0)
            return response()->json($servicos);
        else
            return response()->json([]);
    }

    public function getById($id)
    {
        $servico = $this->model->find($id);
        
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

        return response()->json($servico);
    }

    public function delete($id)
    {
        $servico = $this->model->find($id)->delete();

        return response()->json([]);
    }
}