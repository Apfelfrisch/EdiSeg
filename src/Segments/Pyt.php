<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pyt extends AbstractSegment
{
    protected static $validationBlueprint = [
        'PYT' => ['PYT' => 'M|a|3'],
        '4279' => ['4279' => 'M|n|3'],
    ];

    public static function fromAttributes($qualifier)
    {
        return new static([
            'PYT' => ['PYT' => 'PYT'],
            '4279' => ['4279' => $qualifier]
        ]);
    }

    public function qualifier()
    {
        return $this->elements['4279']['4279'];
    }
}
