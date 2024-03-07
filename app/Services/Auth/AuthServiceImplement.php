<?php

namespace App\Services\Auth;

use App\Enums\HeaderPlatform;
use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Traits\ValidationInput;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthServiceImplement extends Service implements AuthService{

    use ValidationInput;

    /**
     * @throws \Throwable
     * @throws WismaException
     */
    public function authenticate(array $requestedData): array
    {
        $this->validated($requestedData, new AuthenticateRequest());

        if (!Auth::guard("web")->attempt($this->getValidatedData())) {
            throw new WismaException(ResponseCode::ERR_FORBIDDEN_ACCESS, "Invalid credentials");
        }

        $user = auth()->user();

        return [
            "user" => $user,
            "token" => $user->createToken("personal_access_token")
        ];
    }
}
