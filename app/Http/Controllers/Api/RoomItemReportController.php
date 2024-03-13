<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\RoomItemReport;
use App\Http\Resources\Resources\RoomItemReport\RoomItemReportCollection as RoomItemReportRoomItemReportCollection;
use Illuminate\Http\Request;
use App\Repositories\RoomItemReport\RoomItemReportRepository;
use App\Http\Resources\RoomItemReport\RoomItemReportCollection;
use App\Models\Room;
use App\Models\RoomItem;

class RoomItemReportController extends Controller
{
    private RoomItemReportRepository $roomItemReportRepository;
    protected array $responseMessages;

    public function __construct(RoomItemReportRepository $roomItemReportRepository)
    {
        $this->roomItemReportRepository = $roomItemReportRepository;
        $this->responseMessages = [
            "index" => "Load room item report successfully",
            "totalRusak" => "Total rusak",
            "totalHilang" => "Total hilang",
            "total" => "Total"
        ];
    }

    public function index()
    {
        $roomItemReports = $this->roomItemReportRepository->all();
        return $this->response(
            new RoomItemReportCollection($roomItemReports),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRusak()
    {
        $total = $this->roomItemReportRepository->getTotalRusak();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalHilang()
    {
        $total = $this->roomItemReportRepository->getTotalHilang();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function total()
    {
        $total = $this->roomItemReportRepository->getTotal();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
