<?php

use PHPUnit\Framework\TestCase;
require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/Mailer.php';

class MockTest extends TestCase
{

    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('example@example.org', 'Hello');

        $this->assertTrue($result);
    }
}