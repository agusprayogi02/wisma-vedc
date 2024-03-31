<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Response;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use \App\Exceptions\WismaException;

class AuthController extends Controller
{

    protected array $responseMessages;

    public function __construct()
    {
        $this->responseMessages = [
            "authenticate" => "Login user successfully",
        ];
    }


    /**
     * @param AuthService $service
     * @param Request $request
     * @return Response
     * @throws WismaException
     */
    public function authenticate(AuthService $service, Request $request): Response
    {
        $response = $service->authenticate($request->all());

        return $this->response(
            new AuthResource($response),
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
