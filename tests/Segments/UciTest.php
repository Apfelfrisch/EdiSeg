<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Uci;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class UciTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Uci::fromSegLine('UCI+U16D8AE746C4C+9800130000008:502+9870018100006:502+7');

        $this->assertEquals('UCI', $seg->name());
        $this->assertEquals('U16D8AE746C4C', $seg->unbRef());
        $this->assertEquals('9800130000008', $seg->sender());
        $this->assertEquals('502', $seg->senderCode());
        $this->assertEquals('9870018100006', $seg->receiver());
        $this->assertEquals('502', $seg->receiverCode());
        $this->assertEquals('7', $seg->statusCode());
    }

    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $seg = Uci::fromAttributes('UNB_REF', 'SENDER', '123', 'RECEIVER', '321', 7, 25);

        $this->assertEquals('UCI', $seg->name());
        $this->assertEquals('UNB_REF', $seg->unbRef());
        $this->assertEquals('SENDER', $seg->sender());
        $this->assertEquals('123', $seg->senderCode());
        $this->assertEquals('RECEIVER', $seg->receiver());
        $this->assertEquals('321', $seg->receiverCode());
        $this->assertEquals(7, $seg->statusCode());
        $this->assertEquals(25, $seg->errorCode());
    }
}
