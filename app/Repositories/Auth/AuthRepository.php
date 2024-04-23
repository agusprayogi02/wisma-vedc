<?php

namespace App\Repositories\Auth;

use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Traits\ValidationInput;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{

    use ValidationInput;

    /**
     * @throws WismaException
     * @throws \Throwable
     */
    public function authenticate(array $requestedData): array
    {
        $this->validated($requestedData, new AuthenticateRequest());

        if (!Auth::guard("web")->attempt($this->getValidatedData())) {
            throw new WismaException(ResponseCode::ERR_FORBIDDEN_ACCESS, "Invalid credentials");
        }

        $user = auth()->user();

        // Validate Email
        throw_if(
            $user->email_verified_at == null,
            new WismaException(ResponseCode::ERR_FORBIDDEN_ACCESS, "Lakukan verifikasi email terlebih dahulu!")
        );
        return [
            "user" => $user,
            "token" => $user->createToken("personal_access_token")
        ];
    }
}
