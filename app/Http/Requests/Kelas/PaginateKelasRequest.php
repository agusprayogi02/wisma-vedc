<?php

namespace App\Http\Requests\Kelas;

use Illuminate\Foundation\Http\FormRequest;

class PaginateKelasRequest extends FormRequest
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
            "page" => "integer",
            "limit" => "integer",
            "search" => "string",
            "tahun" => "required|integer|digits:4",
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            "page.integer" => "Halaman harus berupa angka",
            "limit.integer" => "Batasan data harus berupa angka",
            "search.string" => "Pencarian harus berupa teks",
            "tahun.required" => "Tahun harus diisi",
            "tahun.integer" => "Tahun harus berupa angka",
            "tahun.digits" => "Tahun harus 4 digit",
        ];
    }
}
