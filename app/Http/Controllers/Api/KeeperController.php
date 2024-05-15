<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Keeper\KeeperRepository;

class KeeperController extends Controller
{
    protected array $responseMessages;
    protected KeeperRepository $keeperRepo;

    public function __construct(KeeperRepository $keeperRepo)
    {
        $this->keeperRepo = $keeperRepo;
        $this->responseMessages = [
            "index" => "Keeper data retrieved successfully",
        ];
    }

    public function index()
    {
        return $this->response(
            $this->keeperRepo->getSummaryRoom(),
            $this->getResponseMessage(__FUNCTION__),
        );
    }
}
