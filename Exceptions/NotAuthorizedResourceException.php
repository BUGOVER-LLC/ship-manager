<?php

declare(strict_types=1);

namespace Ship\Exceptions;

use Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotAuthorizedResourceException extends Exception
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_FORBIDDEN;

    /**
     * @var string
     */
    protected $message = 'You are not authorized to request this resource.';
}
