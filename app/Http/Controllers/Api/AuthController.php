<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\WismaException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Response;
use App\Models\User;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{

    protected array $responseMessages;

    public function __construct()
    {
        $this->responseMessages = [
            "authenticate" => "Login user successfully",
            "index" => "Load Permissions successfully",
        ];
    }


    /**
     * @param AuthRepository $service
     * @param AuthenticateRequest $request
     * @return Response
     * @throws WismaException
     * @throws \Throwable
     */
    public function authenticate(AuthRepository $service, AuthenticateRequest $request): Response
    {
        $response = $service->authenticate($request->all());

        return $this->response(
            new AuthResource($response),
            $this->getResponseMessage(__FUNCTION__)
        );
    }

    public function index(Request $request)
    {
        if (asset($request->user_id)) {
            $permision = User::where('id', $request->user_id)->first()->getAllPermissions()->map(function ($p) {
                return [
                    'name' => $p->name,
                    'guard_name' => $p->guard_name,
                ];
            })->toArray();
        } else {
            $permision = Permission::get(['name', 'guard_name'])->toArray();
        }
        return $this->response(
            $permision,
            $this->getResponseMessage(__FUNCTION__)
        );
    }
}
