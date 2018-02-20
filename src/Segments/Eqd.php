<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Eqd extends AbstractSegment
{
    protected static $validationBlueprint = [
        'EQD' => ['EQD' => 'M|a|3'],
        '8053' => ['8053' => 'M|an|3'],
        'C237' => ['8260' => 'M|n|17'],
    ];

    public static function fromAttributes($qualifier, $processNumber)
    {
        return new static([
            'EQD' => ['EQD' => 'M|a|3'],
            '8053' => ['8053' => $qualifier],
            'C237' => ['8260' => $processNumber],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['8053']['8053'];
    }

    public function processNumber()
    {
        return $this->elements['C237']['8260'];
    }
}
