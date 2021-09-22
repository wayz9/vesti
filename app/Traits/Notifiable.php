<?php

namespace App\Traits;

use App\Services\Mailer;

trait Notifiable
{
    public function notify($emails, $subject, $message): void
    {
        if(empty($emails)){
            return;
        }

        (new Mailer)->sendEmail($emails, $subject, $message);
    }
}
