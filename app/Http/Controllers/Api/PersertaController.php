<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PesertaService;

class PersertaController extends Controller
{
    public function __construct(private readonly PesertaService $service)
    {
        $this->responseMessages = [
            "index" => "Data Peserta per kelas berhasil diambil",
            "show" => "Detail Peserta per kelas"
        ];
    }

    function index($id)
    {
        return $this->response(
            $this->service->show($id),
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
