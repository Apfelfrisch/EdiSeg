<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Moa;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class MoaTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'MOA';
        $qualifier = '380';
        $amount = 10.50;

        $seg = Moa::fromAttributes($qualifier, $amount);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($amount, $seg->amount());
    }

    /** @test */
    public function it_set_the_decimal_places_on_two()
    {
        $segName = 'MOA';
        $qualifier = '380';
        $amount = 10.0;

        $seg = Moa::fromAttributes($qualifier, $amount);
        $this->assertEquals(2, strlen(substr(strrchr($seg->amount(), "."), 1)));
    }

    /** @test */
    public function it_set_the_decimal_char_to_define_one_from_una()
    {
        $segName = 'MOA';
        $decimal = ',';
        $qualifier = '380';
        $amount = 10.0;

        Moa::setBuildDelimiter(new Delimiter(':', '+', $decimal, '?', ' ', '\''));
        $seg = Moa::fromAttributes($qualifier, $amount);
        $this->assertEquals("MOA+380:10,00'", (string)$seg);
    }

    /** @test */
    public function it_gets_always_a_vaild_decimal_number_despite_wich_one_is_defined_in_una()
    {
        $segName = 'MOA';
        $decimal = ',';
        $qualifier = '380';
        $amount = '10.00';

        Moa::setBuildDelimiter(new Delimiter(':', '+', $decimal, '?', ' ', '\''));
        $seg = Moa::fromSegLine("MOA+380:10" . $decimal . "00");
        $this->assertEquals($amount, $seg->amount());
    }
}
