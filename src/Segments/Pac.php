<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pac extends AbstractSegment
{
    protected static $validationBlueprint = [
        'PAC' => ['PAC' => 'M|a|3'],
        '7224' => ['7224' => 'M|a|8'],
        'C531' => ['7075' => 'M|an|3'],
    ];

    public static function fromAttributes($quantity, $code)
    {
        return new static([
            'PAC' => ['PAC' => 'PAC'],
            '7224' => ['7224' => $quantity],
            'C531' => ['7075' => $code],
        ]);
    }

    public function quantity()
    {
        return $this->elements['7224']['7224'];
    }

    public function code()
    {
        return $this->elements['C531']['7075'];
    }
}
