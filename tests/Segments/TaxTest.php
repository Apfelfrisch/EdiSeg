<?php

namespace Proengeno\Edifact\Test\Message\Segments;

use Proengeno\Ediseg\Segments\Tax;
use Proengeno\EdiEnergy\Test\TestCase;
use Proengeno\Edifact\Message\Delimiter;

class TaxTest extends TestCase
{
    /** @test */
    public function it_can_set_and_fetch_basic_informations()
    {
        $segName = 'TAX';
        $qualifier = '7';
        $type = 'VAT';
        $rate = '19';
        $category = 'S';

        $seg = Tax::fromAttributes($qualifier, $type, $rate, $category);

        $this->assertEquals($qualifier, $seg->qualifier());
        $this->assertEquals($type, $seg->type());
        $this->assertEquals($rate, $seg->rate());
        $this->assertEquals($category, $seg->category());
    }
}
