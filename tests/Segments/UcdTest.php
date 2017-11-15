<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Ucd;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class UcdTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Ucd::fromSegLine('UCD+12+3:2');

        $this->assertEquals('UCD', $seg->name());
        $this->assertEquals('12', $seg->errorCode());
        $this->assertEquals('3', $seg->segmentPosition());
        $this->assertEquals('2', $seg->dataGroupPosition());
    }

    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $seg = Ucd::fromAttributes(12, 3, 2);

        $this->assertEquals('UCD', $seg->name());
        $this->assertEquals('12', $seg->errorCode());
        $this->assertEquals('3', $seg->segmentPosition());
        $this->assertEquals('2', $seg->dataGroupPosition());
    }
}
