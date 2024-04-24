<?php

namespace App\Http\Requests\Peserta;

use Illuminate\Foundation\Http\FormRequest;

class ListPesertaRequest extends FormRequest
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
            'id_xkelas' => 'nullable|integer',
            'search' => 'nullable|string',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_xkelas.integer' => 'ID Kelas harus berupa angka',
            'search.string' => 'Pencarian harus berupa teks',
            'limit.integer' => 'Batasan data harus berupa angka',
            'page.integer' => 'Halaman harus berupa angka',
        ];
    }
}
