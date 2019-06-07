<?php
use PHPUnit\Framework\TestCase;

class MailerStaticTest extends TestCase
{

    public function testSendMessageReturnstrue()
    {
        $this->assertTrue(MailerStatic::send('example@example.org', 'Hello'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        MailerStatic::send('', 'Hello');

    }
}