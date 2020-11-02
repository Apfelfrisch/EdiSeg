<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Cav extends AbstractSegment
{
    protected static $validationBlueprint = [
        'CAV' => ['CAV' => 'M|a|3'],
        'C889' => ['7111' => 'O|an|3', '1131' => 'O|an|17', '3055' => 'O|an|3', '7110:1' => 'O|an|35', '7110:2' => 'O|an|35'],
    ];

    public static function fromAttributes($code, $responsCode = null, $valueOne = null, $valueTwo = null, $codeList = null)
    {
        return new static([
            'CAV' => ['CAV' => 'CAV'],
            'C889' => ['7111' => $code, '1131' => $codeList, '3055' => $responsCode, '7110:1' => $valueOne, '7110:2' => $valueTwo],
        ]);
    }

    public function code()
    {
        return $this->elements['C889']['7111'];
    }

    public function codeList()
    {
        return $this->elements['C889']['1131'];
    }

    public function responsCode()
    {
        return $this->elements['C889']['3055'];
    }

    public function value()
    {
        return $this->valueOne();
    }

    public function valueOne()
    {
        return $this->elements['C889']['7110:1'];
    }

    public function valueTwo()
    {
        return $this->elements['C889']['7110:2'];
    }
}
