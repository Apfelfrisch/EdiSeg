<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pcd;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PcdTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $seg = Pcd::fromSegLine('PCD+3:10');

        $this->assertEquals('PCD', $seg->name());
        $this->assertEquals(3, $seg->qualifier());
        $this->assertEquals(10, $seg->percent());
    }

    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $seg = Pcd::fromAttributes(10, 3);

        $this->assertEquals('PCD', $seg->name());
        $this->assertEquals(3, $seg->qualifier());
        $this->assertEquals(10, $seg->percent());
    }
}
