<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Loc;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class LocTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'LOC';
        $qualifier = 'ABC';
        $number = '12345678901234567890123456789012345';
        $priority = '5';

        $seg = Loc::fromAttributes($qualifier, $number, $priority);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($number, $seg->number());
        $this->assertEquals($priority, $seg->priority());
        $this->assertEquals($priority, $seg->priority());
        $this->assertEquals("$segName+$qualifier+$number+++$priority'", (string)$seg);
    }
}
