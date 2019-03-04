<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Cni;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class CniTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Cni::fromSegLine('CNI+1');

        $this->assertEquals('CNI', $seg->name());
        $this->assertEquals('1', $seg->number());
    }
}
