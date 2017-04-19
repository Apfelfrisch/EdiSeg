<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pyt;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PytTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'PYT';
        $qualifier = '3';

        $seg = Pyt::fromAttributes($qualifier);

        $this->assertEquals($qualifier, $seg->qualifier());
    }
}
