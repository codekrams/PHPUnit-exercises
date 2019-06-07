<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testReturnsFullName()
    {
        require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/User.php';

        $user = new User();

        $user->first_name = "Martina";
        $user->surname = "Schwerdtfeger";

        $this->assertEquals('Martina Schwerdtfeger', $user->getFullName());

    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new User();
        $mock_mailer=$this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo('example@example.org'), $this->equalTo('Hello'))
                    ->willReturn(true);

        $user->setMailer($mock_mailer);
        $user->email = 'example@example.org';
        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();
        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->setMethods(null) //none of the methods will be stubbed
                            ->getMock();
        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify("Hello");

    }

}