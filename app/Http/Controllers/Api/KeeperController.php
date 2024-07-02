<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Keeper\ScanKeeperRequest;
use App\Repositories\Keeper\KeeperRepository;
use App\Repositories\Room\RoomRepository;

class KeeperController extends Controller
{
    protected array $responseMessages;
    protected KeeperRepository $keeperRepo;
    protected RoomRepository $roomRepository;

    public function __construct(KeeperRepository $keeperRepo, RoomRepository $roomRepository)
    {
        $this->keeperRepo = $keeperRepo;
        $this->roomRepository = $roomRepository;
        $this->responseMessages = [
            "index" => "Keeper data retrieved successfully",
            "scanCode" => "Room status updated successfully",
        ];
    }

    public function index()
    {
        return $this->response(
            $this->keeperRepo->getSummaryRoom(),
            $this->getResponseMessage(__FUNCTION__),
        );
    }

    /**
     * @throws \Throwable
     */
    public function scanCode(ScanKeeperRequest $request)
    {
        $room = $this->roomRepository->scan($request->code);
        throw_if(!$room, new WismaException(ResponseCode::ERR_ENTITY_NOT_FOUND, "Room not found"));
        $room->update([
            'room_status_id' => $request->status,
        ]);
        return $this->response(null, $this->getResponseMessage(__FUNCTION__));
    }
}
