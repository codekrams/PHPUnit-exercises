<?php
use PHPUnit\Framework\TestCase;

class UserStaticMockeryTest extends TestCase
{

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new UserStaticMockery('example@example.org');
        $mock = \Mockery::mock('alias:MailerStatic');
        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
        ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));

    }
}