<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;


class Mailer
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
    }

    public function sendEmail(array $emails, $subject, $message)
    {
        $this->connect();
        $this->mail->setFrom('no-reply@vesti.com', 'Vesti');

        try {
            foreach ($emails as $email) {
                $this->mail->addAddress($email['email']);
                $this->mail->Subject = $subject;
                $this->mail->Body = $message;
                $this->mail->isHTML(true);

                $this->mail->send();
                $this->mail->clearAddresses();
            }
        } catch (\Exception $e) {
            die("Message could not be sent: {$this->mail->ErrorInfo}");
        }
    }

    protected function connect()
    {
        try {
            $this->mail->isSMTP();
            $this->mail->Host = config('mailer', 'host');
            $this->mail->SMTPAuth = true;
            $this->mail->Port = config('mailer', 'port');
            $this->mail->Username = config('mailer', 'username');
            $this->mail->Password = config('mailer', 'password');
        } catch (\Exception $e) {
            die("There is an error in your connection: {$this->mail->ErrorInfo}");
        }
    }
}
