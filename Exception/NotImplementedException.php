<?php

declare(strict_types=1);

namespace Ship\Exception;

use Ship\Parent\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotImplementedException extends Exception
{
    protected $code = Response::HTTP_NOT_IMPLEMENTED;
    protected $message = 'This method is not yet implemented.';
}
