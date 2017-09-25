<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Ajt extends AbstractSegment
{
    protected static $validationBlueprint = [
        'AJT' => ['AJT' => 'M|a|3'],
        '4465' => ['4465' => 'M|an|3'],
    ];

    public static function fromAttributes($code)
    {
        return new static([
            'AJT' => ['AJT' => 'AJT'],
            '4465' => ['4465' => $code],
        ]);
    }

    public function code()
    {
        return $this->elements['4465']['4465'];
    }
}
