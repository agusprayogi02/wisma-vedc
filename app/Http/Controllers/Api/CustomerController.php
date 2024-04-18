<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerRepository $customerRepository;
    protected array $responseMessages;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->responseMessages = [
            "getRoomCapacity" => "Room capacity retrieved successfully",
        ];
    }

    public function getRoomCapacity($tgl)
    {
        $roomCapacity = $this->customerRepository->getRoomCapacity($tgl);
        return $this->response(
            ["roomCapacity" => $roomCapacity],
            $this->responseMessages["getRoomCapacity"]
        );
    }

    /**
     * @throws \Throwable
     */
    public function bookRoom(Request $request, $customerId)
    {
        throw_if(
            !$request->has('room_id'),
            new WismaException(ResponseCode::ERR_VALIDATION, "Room ID is required")
        );

        $customer = $this->customerRepository->getCustomerData($customerId);
        $reservationDate = $customer->reservation ? $customer->reservation->date_ci : null;
        $room = Room::find($request->room_id);
        throw_if(
            !$room,
            new WismaException(ResponseCode::ERR_VALIDATION, "Room not found")
        );

        $roomCount = $this->customerRepository->countRoomDate($reservationDate, $request->room_id);

        $roomCapacity = $room->roomType->capacity;
        throw_if(
            $roomCount >= $roomCapacity,
            new WismaException(ResponseCode::ERR_VALIDATION, "Room is full")
        );

        throw_if(
            $roomCount > 0 && $room->gender != $customer->gender,
            new WismaException(ResponseCode::ERR_VALIDATION, "Room cannot be chosen due to different gender")
        );

        $update = $this->customerRepository->updateDataCustomer($customerId, $request->all());

        throw_if(
            $update != null,
            new WismaException(ResponseCode::SUCCESS, "Data successfully updated")
        );

        throw_if(
            $update == null,
            new WismaException(ResponseCode::ERR_ACTION_UNAUTHORIZED, "Failed to update data")
        );
    }
}
