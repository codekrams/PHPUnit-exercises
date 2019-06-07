<?php



class Mailer
{

    //send a message
    public function sendMessage($email, $message)
    {
        if (empty($email))
        {
            throw new Exception();
        }
        //Use mail() or PHPMailer for example
        sleep(3);
        echo "send '$message' to '$email'";

        return true;
    }
}