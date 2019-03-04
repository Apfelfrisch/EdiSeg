<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Alc;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class AlcTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Alc::fromSegLine('ALC+A+:Z01');

        $this->assertEquals('ALC', $seg->name());
        $this->assertEquals('A', $seg->qualifier());
        $this->assertEquals('Z01', $seg->code());
    }
}
