<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{

    public function testAddReturnsTheCorrectSum()
    {
        require '/home/martina/PhpstormProjects/PHPUnitCourse/functions.php';
        $this->assertEquals(4, add(2,2));
    }

    public function testAddDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(5, add(2,2));
    }

}