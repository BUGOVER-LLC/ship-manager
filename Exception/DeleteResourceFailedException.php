<?php

declare(strict_types=1);

namespace Ship\Exception;

use Ship\Parent\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class DeleteResourceFailedException extends Exception
{
    protected $code = Response::HTTP_EXPECTATION_FAILED;
    protected $message = 'Failed to delete Resource.';
}
