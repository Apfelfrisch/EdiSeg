<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Ajt;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class AjtTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Ajt::fromSegLine('AJT');

        $this->assertEquals('AJT', $seg->name());
        $this->assertEquals(null, $seg->code());
    }

    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $seg = Ajt::fromAttributes('ABC');

        $this->assertEquals('AJT', $seg->name());
        $this->assertEquals('ABC', $seg->code());
    }
}
