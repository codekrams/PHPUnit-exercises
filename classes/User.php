<?php
require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/Mailer.php';

class User
{

    public $first_name;
    public $surname;
    public $email;
    protected $mailer;

    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify($message)
    {

        return $this->mailer->sendMessage($this->email, $message);
    }


}