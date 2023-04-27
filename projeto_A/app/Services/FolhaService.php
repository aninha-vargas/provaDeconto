<?php

namespace App\Services;

use App\Repositories\FolhaRepository;

class FolhaService
{
    private $folhaRepository;

    public function __construct(FolhaRepository $folhaRepository)
    {
        $this->folhaRepository = $folhaRepository;
    }

    public function listarFolhas()
    {
        return $this->folhaRepository->listar();
    }

    public function cadastrarFolhas($dados)
    {
        return $this->folhaRepository->criar($dados);
    }

    public function calcularFolhas()
    {
        $folhas = $this->listarFolhas();
        foreach ($folhas as $folha) {
            if(!$folha->enviada){
                $ir = $this->calcularIr($folha);
            }
        }
    }

    private function calcularIr($dados)
    {
        $salario = $dados["horas"] * $dados["valor"];
        dd('aqui', $salario);
        switch ($salario) {
            case ($salario <= 1903.98):
                $ir = 0;
                break;
            case ($salario >= 1903.99 && $salario <= 2826.65):
                $ir = ($salario * 0.075) - 142.80;
                break;
            case ($salario >= 1903.99 && $salario <= 2826.65):
                $ir = ($salario * 0.075) - 142.80;

                break;
            case ($salario >= 1903.99 && $salario <= 2826.65):
                $ir = ($salario * 0.075) - 142.80;
                break;
            case ($salario >= 1903.99 && $salario <= 2826.65):
                $ir = ($salario * 0.075) - 142.80;
                break;
        }
    }

}
