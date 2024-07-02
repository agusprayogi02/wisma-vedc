<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Peserta\ListPesertaRequest;
use App\Http\Requests\Peserta\SearchPesertaRequest;
use App\Services\PesertaService;

class PersertaController extends Controller
{
    public function __construct(private readonly PesertaService $service)
    {
        $this->responseMessages = [
            "index" => "Data Peserta per kelas berhasil diambil",
            "show" => "Detail Peserta per kelas",
            "search" => "Data Peserta berhasil diambil",
        ];
    }

    public function index(ListPesertaRequest $request)
    {
        return $this->response(
            $this->service->index($request),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function search(SearchPesertaRequest $request)
    {
        return $this->response(
            $this->service->search($request),
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
