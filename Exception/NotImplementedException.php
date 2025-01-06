<?php

namespace Ship\Exception;

use Ship\Parents\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotImplementedException extends Exception
{
    protected $code = Response::HTTP_NOT_IMPLEMENTED;
    protected $message = 'This method is not yet implemented.';
}
