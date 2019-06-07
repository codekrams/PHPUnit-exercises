<?php


class UserStatic
{

    public $email;
    protected $mailer_callable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailerCallable(callable $mailer)
    {
        $this->mailer_callable = $mailer;

    }

    public function notify($message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }

}