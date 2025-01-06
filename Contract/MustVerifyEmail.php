<?php

declare(strict_types=1);

namespace Ship\Contract;

interface MustVerifyEmail extends \Illuminate\Contracts\Auth\MustVerifyEmail
{
    /**
     * Send the email verification notification with frontend verification url.
     *
     * @param string $verificationUrl
     * @return void
     */
    public function sendEmailVerificationNotificationWithVerificationUrl(string $verificationUrl): void;
}
