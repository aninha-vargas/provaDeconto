<?php

namespace App\Http\Controllers;
use App\Services\FolhaService;
use Illuminate\Http\Request;

class FolhaController extends Controller
{
    private $folhaService;

    public function __construct(FolhaService $folhaService)
    {
        $this->folhaService = $folhaService;
    }

    public function listarFolhas()
    {
        return $this->folhaService->listarFolhas();
    }

    public function cadastrarFolhas()
    {
        return $this->folhaService->cadastrarFolhas();
    }
    public function calcularFolhas()
    {
        return $this->folhaService->calcularFolhas();
    }
}
