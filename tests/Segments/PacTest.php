<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pac;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PacTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Pac::fromSegLine('PAC');

        $this->assertEquals('PAC', $seg->name());
        $this->assertEquals(null, $seg->quantity());
        $this->assertEquals(null, $seg->code());
    }

    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $seg = Pac::fromAttributes(5, 'ME1');

        $this->assertEquals(5, $seg->quantity());
        $this->assertEquals('ME1', $seg->code());
    }
}
