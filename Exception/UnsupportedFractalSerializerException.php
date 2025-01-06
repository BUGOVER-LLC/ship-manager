<?php

namespace Ship\Exception;

use Ship\Parents\Exception\Exception;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class UnsupportedFractalSerializerException extends Exception
{
    protected $code = SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR;
    protected $message = 'Unsupported Fractal Serializer!';
}
