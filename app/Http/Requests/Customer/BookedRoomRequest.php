<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class BookedRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "room_id" => "required|number",
            "name" => "string",
            "gender" => "string|in:L,P",
            "address" => "string",
            "phone" => "string",
        ];
    }

    function messages(): array
    {
        return [
            "room_id.required" => "Room ID is required",
        ];
    }
}
