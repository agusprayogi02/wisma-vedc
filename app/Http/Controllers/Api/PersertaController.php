<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Peserta\ListPesertaRequest;
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

    function index(ListPesertaRequest $request)
    {
        return $this->response(
            $this->service->index($request->get('id_xkelas'), $request->get('search')),
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
