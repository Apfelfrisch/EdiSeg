<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pgi;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PgiTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Pgi::fromAttributes('ABC');

        $this->assertEquals('PGI', $seg->name());
        $this->assertEquals('ABC', $seg->code());
    }
}
