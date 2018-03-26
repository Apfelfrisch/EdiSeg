<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pri extends AbstractSegment
{
    use Traits\DecimalAmountTrait;

    protected static $validationBlueprint = [
        'PRI' => ['PRI' => 'M|a|3'],
        'C509' => ['5125' => 'M|n|3', '5118' => 'M|n|15', '5375' => null, '5387' => null, '5284' => null, '6411' => 'D|an|8'],
    ];

    public static function fromAttributes($qualifier, $amount, $unitCode = null)
    {
        return new static([
            'PRI' => ['PRI' => 'PRI'],
            'C509' => ['5125' => $qualifier, '5118' => $amount, '5375' => null, '5387' => null, '5284' => null, '6411' => $unitCode]
        ]);
    }

    public function qualifier()
    {
        return $this->elements['C509']['5125'];
    }

    public function amount()
    {
        return $this->replaceToValidDecimal($this->elements['C509']['5118']);
    }

    public function unitCode()
    {
        return $this->elements['C509']['6411'];
    }
}
