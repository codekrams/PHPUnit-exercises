<?php

use PHPUnit\Framework\TestCase;


class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {

        $doctor = new Doctor('Smith');

        $this->assertEquals('Dr. Smith', $doctor->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
                     ->setConstructorArgs(['Smith'])
                     ->getMockForAbstractClass();

        $mock->method('getTitle')
            ->willReturn('Dr.');

        $this->assertEquals('Dr. Smith', $mock->getNameAndTitle());

    }

}