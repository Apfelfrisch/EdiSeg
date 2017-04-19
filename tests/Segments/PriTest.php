<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pri;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PriTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'PRI';
        $qualifier = 'CAL';
        $amount = '36.6666';
        $unitCode = 'ANN';

        $seg = Pri::fromAttributes($qualifier, $amount, $unitCode);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($amount, $seg->amount());
        $this->assertEquals($unitCode, $seg->unitCode());
    }
}
