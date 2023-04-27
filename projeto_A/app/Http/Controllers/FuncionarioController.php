<?php

namespace App\Http\Controllers;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    private $funcionarioService;

    public function __construct(FuncionarioService $funcionarioService)
    {
        $this->funcionarioService = $funcionarioService;
    }

    public function listarFuncionarios()
    {
        return $this->funcionarioService->listarFuncionarios();
    }

    public function cadastrarFuncionarios(Request $request)
    {
        return $this->funcionarioService->cadastrarFuncionarios($request->all());
    }
}
