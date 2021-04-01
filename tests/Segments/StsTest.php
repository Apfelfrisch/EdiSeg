<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Sts;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class StsTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'STS';
        $category = 7;
        $reason = 'Z26';

        $seg = Sts::fromAttributes($category, $reason);

        $this->assertEquals($category, $seg->category());
        $this->assertEquals($reason, $seg->reason());
    }

    /** @test */
    public function it_can_set_and_fetch_codelist_answers()
    {
        $segName = 'STS';
        $category = 'E01';
        $answer = 'E15';
        $code = 'G_0008';

        $seg = Sts::fromAttributes($category, $answer, $code);

        $this->assertEquals($category, $seg->category());
        $this->assertEquals($answer, $seg->reason());
        $this->assertEquals($code, $seg->code());
        $this->assertEquals("STS+E01++E15:G_0008'", (string)$seg);
    }
}
