<?php

namespace App\Services;

use App\Repositories\FolhaRepository;
use Illuminate\Support\Facades\Http;

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

    public function cadastrarFolhas()
    {
        $response = Http::asForm()->get('http://127.0.0.1:9000/api/folha/calcular');

        return $this->folhaRepository->criar(json_decode($response));
    }
}
