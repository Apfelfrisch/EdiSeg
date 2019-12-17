<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Pty;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class PtyTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'PTY';
        $qualifier = 'Z01';
        $priority = 234567;

        $seg = Pty::fromAttributes($qualifier, $priority);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($priority, $seg->priority());
    }
}
