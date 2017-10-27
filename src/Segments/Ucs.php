<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Ucs extends AbstractSegment
{
    protected static $validationBlueprint = [
        'UCS' => ['UCS' => 'M|an|3'],
        '0096' => ['0096' => 'M|a|6'],
        '0085' => ['0085' => 'M|a|2'],
    ];

    public static function fromAttributes($position, $error) {
        return new static([
            'UCS' => ['UCS' => 'M|an|3'],
            '0096' => ['0096' => $position],
            '0085' => ['0085' => $error],
        ]);
    }

    public function position()
    {
        return $this->elements['0096']['0096'];
    }

    public function error()
    {
        return $this->elements['0085']['0085'];
    }
}
