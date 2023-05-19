<?php

namespace Ship\Exceptions;

use Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotAuthorizedResourceException extends Exception
{
    protected $code = Response::HTTP_FORBIDDEN;
    protected $message = 'You are not authorized to request this resource.';
}
