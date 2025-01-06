<?php

namespace Ship\Exception;

use Ship\Parents\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class ValidationFailedException extends Exception
{
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;
    protected $message = 'Invalid Input.';
}
