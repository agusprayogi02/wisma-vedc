<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\RoomItemReport\RoomItemReportCollection as RoomItemReportRoomItemReportCollection;
use App\Http\Resources\RoomItemReport\RoomItemReportCollection;
use App\Repositories\RoomItemReport\RoomItemReportRepository;

class RoomItemReportController extends Controller
{
    private RoomItemReportRepository $repo;
    protected array $responseMessages;

    public function __construct(RoomItemReportRepository $repo)
    {
        $this->repo = $repo;
        $this->responseMessages = [
            "index" => "Load room item report successfully",
            "totalRusak" => "Total rusak",
            "totalHilang" => "Total hilang",
            "total" => "Total"
        ];
    }

    public function index()
    {
        $roomItemReports = $this->repo->all();
        return $this->response(
            new RoomItemReportCollection($roomItemReports),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRusak()
    {
        $total = $this->repo->getTotalRusak();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalHilang()
    {
        $total = $this->repo->getTotalHilang();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function total()
    {
        $total = $this->repo->getTotal();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
