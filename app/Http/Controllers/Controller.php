<?php

namespace App\Http\Controllers;

use App\Enums\ResponseCode;
use App\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use DispatchesJobs;

    protected array $responseMessages;

    /**
     * Use to get response message
     *
     * @param string $context
     * @return string
     */
    public function getResponseMessage(string $context): string
    {
        return $this->responseMessages[$context];
    }

    /**
     * @param Arrayable<int|string, mixed>|LengthAwarePaginator<Model>|CursorPaginator<Model>|array<int|string, mixed>|null $data
     * @param ResponseCode $rc
     * @param string|null $message
     * @return Response
     */
    public function response(
        JsonResource|ResourceCollection|Arrayable|LengthAwarePaginator|CursorPaginator|array|null $data = null,
        ?string                                                                                   $message = null,
        ResponseCode                                                                              $rc = ResponseCode::SUCCESS,
    ): Response
    {
        return new Response($data, $message, $rc);
    }
}
