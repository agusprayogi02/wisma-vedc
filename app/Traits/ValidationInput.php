<?php

namespace App\Traits;

use App\Enums\ResponseCode;
use App\Exceptions\WismaException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait ValidationInput
{
    protected array $validatedData;

    /**
     * @param array $data
     * @param Request $request
     * @return array
     * @throws WismaException
     */
    public function validated(array $data, Request $request): array
    {
        if (!$request->authorize())
            throw new WismaException(ResponseCode::ERR_FORBIDDEN_ACCESS, "You are unauthorized to access this resource");

        $validator = Validator::make($data, $request->rules(), $request->messages())->validate();

        $this->setValidatedData($validator);

        return $validator;
    }

    /**
     * Validates inputs.
     *
     * @param array $inputs
     * @param array $rules
     * @param array $messages
     * @param array $attributes
     *
     * @return array
     *
     * @throws ValidationException
     */
    public function validate(array $inputs, array $rules, array $messages = [], array $attributes = []): array
    {
        return Validator::make($inputs, $rules, $messages, $attributes)->validate();
    }


    protected function setValidatedData(array $validatedData): self
    {
        $this->validatedData = $validatedData;
        return $this;
    }


    /**
     * @return array
     */
    protected function getValidatedData(): array
    {
        return $this->validatedData;
    }
}
