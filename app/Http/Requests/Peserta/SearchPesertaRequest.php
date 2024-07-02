<?php

namespace App\Http\Requests\Peserta;

use Illuminate\Foundation\Http\FormRequest;

class SearchPesertaRequest extends FormRequest
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
     * @return array<string, string>
     *     search: string|integer|null
     */
    public function rules(): array
    {
        return [
            "search" => "nullable",
            "limit" => "nullable|integer",
            "page" => "nullable|integer",
        ];
    }
}
