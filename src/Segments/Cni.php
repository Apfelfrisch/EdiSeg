<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Cni extends AbstractSegment
{
    protected static $validationBlueprint = [
        'CNI' => ['CNI' => 'M|a|3'],
        '1490' => ['1490' => 'M|n|5'],
    ];

    public static function fromAttributes($number)
    {
        return new static([
            'CNI' => ['CNI' => 'CNI'],
            '1490' => ['1490' => $number],
        ]);
    }

    public function number()
    {
        return $this->elements['1490']['1490'];
    }
}
