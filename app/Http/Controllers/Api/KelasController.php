<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\WismaException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kelas\PaginateKelasRequest;
use App\Http\Resources\Kelas\KelasResource;
use App\Services\KelasService;
use App\Services\PesertaService;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    protected array $responseMessages;

    public function __construct(private readonly KelasService $service, private readonly PesertaService $pesertaService)
    {
        $this->responseMessages = [
            "index" => "Data kelas berhasil diambil",
            "show" => "Detail kelas berhasil diambil"
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PaginateKelasRequest $request)
    {
        return $this->response(
            $this->service->index($request),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @throws \Throwable
     */
    public function show(string $id)
    {
        $kelas = $this->service->show($id);
        throw_if(empty($kelas), new WismaException(message: "Kelas tidak ditemukan"));
        $peserta = $this->pesertaService->show($id);
        $data = $kelas[0];
        $data->peserta = $peserta;
        return $this->response(
            new KelasResource($data),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
