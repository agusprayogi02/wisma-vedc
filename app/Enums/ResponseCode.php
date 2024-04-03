<?php

namespace App\Enums;

use ArchTech\Enums\From;
use ArchTech\Enums\Values;
use ArchTech\Enums\Options;
use ArchTech\Enums\InvokableCases;
use Symfony\Component\HttpFoundation\Response;

enum ResponseCode
{
    use From;
    use Values;
    use Options;
    use InvokableCases;

    case SUCCESS;
    case ERR_VALIDATION;
    case ERR_INVALID_OTP;
    case ERR_EXPIRED_OTP;
    case ERR_AUTHENTICATION;
    case ERR_INVALID_IP_ADDRESS;
    case ERR_MISSING_SIGNATURE_HEADER;
    case ERR_INVALID_SIGNATURE_HEADER;
    case ERR_INVALID_OPERATION;
    case ERR_ENTITY_NOT_FOUND;
    case ERR_ROUTE_NOT_FOUND;
    case ERR_UNKNOWN;
    case ERR_FORBIDDEN_ACCESS;
    case ERR_METHOD_NOT_IMPLEMENTED;
    case ERR_ACTION_UNAUTHORIZED;
    case ERR_REQUIRED_DOCUMENT;
    case ERR_REQUIRED_APPROVER;
    case ERR_NEED_ADMIN_ACTION;
    case ERR_APPROVERS_NOT_SET;
    case ERR_SYNC_OSA_INVALID_REQUEST;
    case ERR_UNIQUE_RECORD;
    case ERR_NEED_PAYMENT_FOR_PREVIOUS_BILL;


    /**
     * Determine httpCode from response code.
     *
     * @return int
     */
    public function httpCode(): int
    {
        return match ($this) {
            self::SUCCESS => Response::HTTP_OK,

            self::ERR_MISSING_SIGNATURE_HEADER,
            self::ERR_INVALID_SIGNATURE_HEADER,
            self::ERR_INVALID_IP_ADDRESS,
            self::ERR_AUTHENTICATION => Response::HTTP_UNAUTHORIZED,

            self::ERR_UNIQUE_RECORD,
            self::ERR_ENTITY_NOT_FOUND,
            self::ERR_EXPIRED_OTP,
            self::ERR_INVALID_OTP,
            self::ERR_VALIDATION,
            self::ERR_REQUIRED_APPROVER,
            self::ERR_REQUIRED_DOCUMENT,
            self::ERR_NEED_ADMIN_ACTION,
            self::ERR_SYNC_OSA_INVALID_REQUEST,
            self::ERR_APPROVERS_NOT_SET,
            self::ERR_NEED_PAYMENT_FOR_PREVIOUS_BILL => Response::HTTP_UNPROCESSABLE_ENTITY,

            self::ERR_INVALID_OPERATION => Response::HTTP_EXPECTATION_FAILED,

            self::ERR_ROUTE_NOT_FOUND => Response::HTTP_NOT_FOUND,

            self::ERR_UNKNOWN,
            self::ERR_METHOD_NOT_IMPLEMENTED => Response::HTTP_INTERNAL_SERVER_ERROR,
            self::ERR_FORBIDDEN_ACCESS => Response::HTTP_FORBIDDEN,
            self::ERR_ACTION_UNAUTHORIZED => Response::HTTP_FORBIDDEN,


            default => Response::HTTP_BAD_REQUEST
        };
    }

    /**
     * Set error to readable message string.
     *
     * @return string
     */
    public function message(): string
    {
        return ucwords(strtolower(str_replace(['ERR_', '_'], ['', ' '], $this->name)));
    }
}
