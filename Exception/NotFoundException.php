<?php

declare(strict_types=1);

namespace Ship\Exception;

use Ship\Parent\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends Exception
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;

    /**
     * @var string
     */
    protected $message = 'The requested Resource was not found.';
}
