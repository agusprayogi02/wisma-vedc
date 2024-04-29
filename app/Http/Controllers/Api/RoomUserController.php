<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomUser\RoomUserResourceCollection;
use App\Repositories\RoomUser\RoomUserRepository;


class RoomUserController extends Controller
{
    private RoomUserRepository $roomUserRepository;
    protected array $responseMessages;

    public function __construct(RoomUserRepository $roomUserRepository)
    {
        $this->roomUserRepository = $roomUserRepository;
        $this->responseMessages = [
            "index" => "Load room user successfully",
            "RoomUser" => "User room"
        ];
    }

    public function index()
    {
        $roomUsers = $this->roomUserRepository->all();
        return $this->response(
            new RoomUserResourceCollection($roomUsers),
            $this->getResponseMessage(__FUNCTION__)
        );
    }


    public function RoomUser()
    {
        $total = $this->roomUserRepository->getRoomReportCleaner();
        return $this->response(
            $total,
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
