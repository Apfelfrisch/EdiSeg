<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Cci extends AbstractSegment
{
    protected static $validationBlueprint = [
        'CCI' => ['CCI' => 'M|a|3'],
        '7059' => ['7059' => 'O|an|3'],
        'C502' => ['6313' => null],
        'C240' => ['7037' => 'O|an|17', '1131' => null, '3055' => null, '7036' => 'O|an|35'],
    ];

    public static function fromAttributes($type, $code, $mark = null, $codeList = null, $codeResponsible = null)
    {
        return new static([
            'CCI' => ['CCI' => 'CCI'],
            '7059' => ['7059' => $type],
            'C502' => ['6313' => null],
            'C240' => ['7037' => $code, '1131' => $codeList, '3055' => $codeResponsible, '7036' => $mark],
        ]);
    }

    public function type()
    {
        return $this->elements['7059']['7059'];
    }

    public function code()
    {
        return $this->elements['C240']['7037'];
    }

    public function codeList()
    {
        return $this->elements['C240']['1131'];
    }

    public function codeResponsible()
    {
        return $this->elements['C240']['3055'];
    }

    public function mark()
    {
        return $this->elements['C240']['7036'];
    }
}
