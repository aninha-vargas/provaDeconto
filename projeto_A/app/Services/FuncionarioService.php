<?php

namespace App\Services;

use App\Repositories\FuncionarioRepository;

class FuncionarioService
{
    private $funcionarioRepository;

    public function __construct(FuncionarioRepository $funcionarioRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
    }

    public function listarFuncionarios()
    {
        return $this->funcionarioRepository->listar();
    }

    public function cadastrarFuncionarios($dados)
    {
        return $this->funcionarioRepository->criar($dados);
    }

}
