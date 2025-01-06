<?php

namespace Ship\Exception;

use Ship\Parents\Exception\Exception;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class EmailIsMissedException extends Exception
{
    protected $code = SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR;
    protected $message = 'One of the Emails is missed, check your configs..';
}
