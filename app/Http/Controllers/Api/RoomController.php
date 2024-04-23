<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\PaginateRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Http\Resources\Room\RoomResourceCollection;
use App\Models\RoomStatus;
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
            "totalRoom" => "Total room",
            "totalRoomKotorToday" => "Total room kotor today",
            "totalRoomReadyToday" => "Total room ready today",
            "totalRoomUsedByAsramaToday" => "Total room used by asrama today",
            "updateRoomStatus" => "Update room status successfully",
        ];
    }

    public function index(PaginateRoomRequest $request)
    {
        $rooms = $this->roomRepository->getRooms($request->perPage ?? 10);
        return $this->response(
            new RoomResourceCollection($rooms),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoomUsedToday()
    {
        $total = $this->roomRepository->getTotalRoomUsedToday();
        return $this->response(
            $total,
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoomKotorToday()
    {
        $room = $this->roomRepository->getTotalRoomKotorToday();
        return $this->response(
            $room,
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoomReadyToday()
    {
        $total = $this->roomRepository->getTotalRoomReadyToday();
        return $this->response(
            $total,
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoom()
    {
        $total = $this->roomRepository->getTotalRoom();
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function totalRoomUsedByAsramaToday($boarding_house_id)
    {
        $total = $this->roomRepository->getTotalRoomUsedByAsramaToday($boarding_house_id); // Mengirimkan ID asrama sebagai parameter
        return $this->response(
            ["total" => $total],
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    /**
     * @throws \Throwable
     */
    public function updateRoomStatus(UpdateRoomRequest $request, $id)
    {
        $check_room_status = RoomStatus::find($request->room_status_id);
        throw_if(
            !$check_room_status,
            new WismaException(ResponseCode::ERR_VALIDATION, "Room status not found")
        );

        $update = $this->roomRepository->update($id, $request->all());
        return $this->response(
            $update,
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
