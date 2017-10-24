<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pcd extends AbstractSegment
{
    protected static $validationBlueprint = [
        'PCD' => ['PCD' => 'M|a|3'],
        'C501' => ['5245' => 'M|an|3', '5482' => 'M|n|10'],
    ];

    public static function fromAttributes($percent, $qualifier = 3)
    {
        return new static([
            'PCD' => ['PCD' => 'PCD'],
            'C501' => ['5245' => $qualifier, '5482' => $percent],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['C501']['5245'];
    }

    public function percent()
    {
        return $this->elements['C501']['5482'];
    }
}
