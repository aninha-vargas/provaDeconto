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
                $salario = $folha["horas"] * $folha["valor"];
                $ir = $this->calcularIr($folha);
                $inss = $this->calcularInss($folha);
                $fgts = $salario * 0.08;
                $salarioLiquido = $salario - $ir - $inss;
            }
            $folhaAlterada = $this->folhaRepository->atualizar($folha['id'], [$folha['enviada']]);
            $retorno[] = [$folha['id'], $salarioLiquido];
        }
        return $retorno;
    }

    private function calcularIr($dados)
    {
        $salario = $dados["horas"] * $dados["valor"];
        switch ($salario) {
            case ($salario <= 1903.98):
                $ir = 0;
                break;
                case ($salario >= 1903.99 && $salario <= 2826.65):
                    $ir = ($salario * 0.075) - 142.80;
                    break;
                    case ($salario >= 2826.66 && $salario <= 3751.05): // 2826.66 até R$3751.05
                        $ir = ($salario * 0.15) - 354.80;
                        break;
                        case ($salario >= 3751.06 && $salario <= 4664.68): //De R$ 3751.06 até R$4664.68
                            $ir = ($salario * 0.225) - 636.13;
                            break;
                            case ($salario > 4664.68): //Acima de R$ 4664.68
                                $ir = ($salario * 0.275) - 869.36;
                                break;
                            }
                            return $ir;
    }

    public function calcularInss($dados)
    {
        // Até R$ 1693.72 8%
        // De R$ 1693.73 até R$2822.90 9%
        // De R$ 2822.91 até R$5645.80 11%
        // Acima de R$ 5645.81 R$ 621.03 (fixo)

        $salario = $dados["horas"] * $dados["valor"];
        switch ($salario) {
            case ($salario <= 1693.72):
                $inss = $salario * 0.08;
                break;
                case ($salario >= 1693.73 && $salario <=2822.90):
                    $inss = $salario * 0.09;
                    break;
                    case ($salario >= 2822.91 && $salario <=5645.80):
                        $inss = $salario * 0.11;
                        break;
                        case ($salario > 5645.81):
                            $inss = 621.03;
                            break;
            }
            return $inss;
    }
}
