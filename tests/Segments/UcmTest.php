<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Ucm;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class UcmTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations_from_segline()
    {
        $segName = 'UCM';
        $referenz = '1234567890123A';
        $type ='12345A';
        $versionNumber = 'ABC';
        $releaseNumber = 'CBA';
        $organisation = 'AB';
        $organisationCode = '12345A';
        $error = 13;

        $seg = Ucm::fromAttributes($referenz, $type, $versionNumber, $releaseNumber, $organisation, $organisationCode, 13);

        $this->assertEquals($segName, $seg->name());
        $this->assertEquals($referenz, $seg->referenz());
        $this->assertEquals($type, $seg->type());
        $this->assertEquals($versionNumber, $seg->versionNumber());
        $this->assertEquals($releaseNumber, $seg->releaseNumber());
        $this->assertEquals($organisation, $seg->organisation());
        $this->assertEquals($organisationCode, $seg->organisationCode());
        $this->assertEquals(4, $seg->status());
        $this->assertEquals($error, $seg->error());
    }
}
