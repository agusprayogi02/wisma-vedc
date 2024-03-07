<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepository;
class RoomController extends Controller
{
    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function index()
    {
        $rooms = $this->roomRepository->getRooms();
        return response()->json($rooms);
    }

    public function totalRoomUsedToday()
    {
        $total = $this->roomRepository->getTotalRoomUsedToday();
        return response()->json($total);
    }
}
