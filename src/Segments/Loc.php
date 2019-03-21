<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Loc extends AbstractSegment
{
    protected static $validationBlueprint = [
        'LOC' => ['LOC' => 'M|a|3'],
        '3227' => ['3227' => 'M|an|3'],
        'C517' => ['3225' => 'M|an|35'],
        'C519' => ['3223' => null],
        'C553' => ['3233' => null],
        '5479' => ['5479' => 'O|n|1'],
    ];

    public static function fromAttributes($qualifier, $number, $priority = null)
    {
        return new static([
            'LOC' => ['LOC' => 'LOC'],
            '3227' => ['3227' => $qualifier],
            'C517' => ['3225' => $number],
            'C519' => ['3223' => null],
            'C553' => ['3233' => null],
            '5479' => ['5479' => $priority],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['3227']['3227'];
    }

    public function number()
    {
        return $this->elements['C517']['3225'];
    }

    public function priority()
    {
        return $this->elements['5479']['5479'];
    }
}
