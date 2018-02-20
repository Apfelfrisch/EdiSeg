<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Eqd;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class EqdTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $qualifier = 'Z01';
        $processNumber = '123456';

        $seg = Eqd::fromAttributes($qualifier, $processNumber);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($processNumber, $seg->processNumber());
    }
}
