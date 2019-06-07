<?php
use PHPUnit\Framework\TestCase;

class UserStaticTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new UserStatic('example@example.org');
        $user->setMailerCallable(function()
        {
            echo "mocked";
            return true;
        }
        );

        $this->assertTrue($user->notify('Hello'));
    }

}