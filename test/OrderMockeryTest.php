<?php
use Mockery\Adapter\Phpunit\MockeryTestCase;
require '/home/martina/PhpstormProjects/PHPUnitCourse/src/classes/Order.php';

class OrderMockeryTest extends MockeryTestCase
{
    public function testOrderIsProcessed()
    {

        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);

        $order = new Order($gateway);
        $order->amount=200;
        $this->assertTrue($order->process());
    }

}