<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Tax extends AbstractSegment
{
    protected static $validationBlueprint = [
        'TAX' => ['TAX' => 'M|a|3'],
        '5283' => ['5283' => 'M|n|3'],
        'C241' => ['5153' => 'M|n|3'],
        'C533' => ['5289' => null],
        '5286' => ['5286' => null],
        'C243' => ['5279' => null, '1131' => null, '3055' => null, '5278' => 'D|n|17'],
        '5305' => ['5305' => 'M|an|3'],
    ];

    public static function fromAttributes($qualifier, $type, $rate, $category)
    {
        return new static([
            'TAX' => ['TAX' => 'TAX'],
            '5283' => ['5283' => $qualifier],
            'C241' => ['5153' => $type],
            'C533' => ['5289' => null],
            '5286' => ['5286' => null],
            'C243' => ['5279' => null, '1131' => null, '3055' => null, '5278' => $rate],
            '5305' => ['5305' => $category],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['5283']['5283'];
    }

    public function type()
    {
        return $this->elements['C241']['5153'];
    }

    public function rate()
    {
        return $this->elements['C243']['5278'];
    }

    public function category()
    {
        return $this->elements['5305']['5305'];
    }
}
