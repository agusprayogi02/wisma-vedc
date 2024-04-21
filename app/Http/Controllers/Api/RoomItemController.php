<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomItem\RoomItemResourceCollection;
use App\Repositories\RoomItem\RoomItemRepository;

class RoomItemController extends Controller
{
    private RoomItemRepository $roomItemRepository;
    protected array $responseMessages;

    public function __construct(RoomItemRepository $roomItemRepository)
    {
        $this->roomItemRepository = $roomItemRepository;
        $this->responseMessages = [
            "index" => "Load room items successfully",
            "RoomItem" => "Room item",
        ];
    }

    public function RoomItem()
    {
        $roomItems = $this->roomItemRepository->getRoomItems();
        return $this->response(
            new RoomItemResourceCollection($roomItems),
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
