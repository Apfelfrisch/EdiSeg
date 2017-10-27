<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pgi extends AbstractSegment
{
    protected static $validationBlueprint = [
        'PGI' => ['PGI' => 'M|a|3'],
        '5379' => ['5379' => 'M|an|3'],
    ];

    public static function fromAttributes($code)
    {
        return new static([
            'PGI' => ['PGI' => 'PGI'],
            '5379' => ['5379' => $code],
        ]);
    }

    public function code()
    {
        return $this->elements['5379']['5379'];
    }
}
