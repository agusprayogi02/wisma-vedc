<?php

namespace App\Exceptions;

use App\Enums\ResponseCode;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        $this->renderable(function (Throwable $e) {
            $statusCode = 500;
            $message = [
                env('APP_ENV') == 'local' && env('APP_DEBUG')
                ? 'Internal server error ' . $e->getMessage()
                : 'Internal server error',
            ];
            if ($e instanceof ValidationException) {
                $messages = [];

                foreach ($e->errors() as $error) {
                    $messages[] = $error[0];
                }
                $message = $messages;
                $statusCode = 422;
            }

            if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException || $e instanceof ItemNotFoundException) {
                $statusCode = 404;
                $message = ['The data you\'re looking for couldn\'t be found'];
            }

            if ($e instanceof UnauthorizedException || $e instanceof UnauthorizedHttpException || $e instanceof AuthenticationException) {
                $statusCode = 401;
                $message = [$e->getMessage()];
            }

            if ($e instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
                $statusCode = 403;
                $message = [$e->getMessage()];
            }

            if ($e instanceof UnprocessableEntityHttpException) {
                $statusCode = 400;
                $message = [$e->getMessage()];
            }

            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
                $message = [$e->getMessage()];
            }

            return response()->json(['message' => $message,], $statusCode);
        });

    }
}
