<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Ucd extends AbstractSegment
{
    protected static $validationBlueprint = [
        'UCD' => ['UCD' => 'M|an|3'],
        '0085' => ['0085' => 'M|n|2'],
        'S011' => ['0098' => 'M|n|3', '0104' => 'O|an|3'],
    ];

    public static function fromAttributes($errorCode, $segmentPosition, $dataGroupPosition = null) {
        return new static([
            'UCD' => ['UCD' => 'UCD'],
            '0085' => ['0085' => $errorCode],
            'S011' => ['0098' => $segmentPosition, '0104' => $dataGroupPosition],
        ]);
    }

    public function errorCode()
    {
        return $this->elements['0085']['0085'];
    }

    public function segmentPosition()
    {
        return $this->elements['S011']['0098'];
    }

    public function dataGroupPosition()
    {
        return $this->elements['S011']['0104'];
    }
}
