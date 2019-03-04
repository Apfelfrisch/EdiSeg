<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Alc extends AbstractSegment
{
    protected static $validationBlueprint = [
        'ALC' => ['ALC' => 'M|a|3'],
        '5463' => ['5463' => 'M|an|3'],
        'C552' => ['1230' => null, '5189' => 'M|an|3'],
    ];

    public static function fromAttributes($qualifier, $code)
    {
        return new static([
            'ALC' => ['ALC' => 'ALC'],
            '5463' => ['5463' => $qualifier],
            'C552' => ['1230' => null, '5189' => $code],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['5463']['5463'];
    }

    public function code()
    {
        return $this->elements['C552']['5189'];
    }
}
