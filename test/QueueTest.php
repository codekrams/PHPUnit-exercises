<?php

use PHPUnit\Framework\TestCase;
require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/Queue.php';
require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/QueueException.php';


class QueueTest extends TestCase
{
    protected $queue;
    protected function setUp(): void
    {
        $this->queue = new Queue();
    }
    protected function tearDown(): void
    {
        unset($this->queue);
    }
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }
    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('test');
        $this->assertEquals(1, $this->queue->getCount());
    }
    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('test');
        $item=$this->queue->pop();
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('test', $item);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i=0; $i<Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i=0; $i<Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");

        $this->queue->push("testitest");

    }
}