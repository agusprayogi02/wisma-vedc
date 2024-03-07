<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomResourceCollection;
use App\Repositories\Room\RoomRepository;

class RoomController extends Controller
{
    private RoomRepository $roomRepository;
    protected array $responseMessages;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->responseMessages = [
            "index" => "Load rooms successfully",
            "totalRoomUsedToday" => "Total room used today",
        ];
    }

    public function index()
    {
        $rooms = $this->roomRepository->getRooms();
        return $this->response(
            new RoomResourceCollection($rooms),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoomUsedToday()
    {
        $total = $this->roomRepository->getTotalRoomUsedToday();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
