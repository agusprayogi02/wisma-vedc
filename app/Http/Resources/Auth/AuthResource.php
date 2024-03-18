<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this["user"];
        $token = $this["token"]->plainTextToken;
        return [
            "id" => $user->id,
            "name" => $user->name,
            "username" => $user->username,
            "phone" => $user->phone,
            "email" => $user->email,
            "access_token" => $token
        ];
    }
}
