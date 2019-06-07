<?php


class UserStaticMockery
{

    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function notify($message)
    {
        return MailerStatic::send($this->email, $message);
    }

}