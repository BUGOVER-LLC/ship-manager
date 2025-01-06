<?php

declare(strict_types=1);

namespace Ship\Exception;

use Ship\Parents\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class CreateResourceFailedException extends Exception
{
    protected $code = Response::HTTP_EXPECTATION_FAILED;
    protected $message = 'Failed to create Resource.';
}
