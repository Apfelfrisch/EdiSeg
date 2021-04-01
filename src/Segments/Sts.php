<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Sts extends AbstractSegment
{
    protected static $validationBlueprint = [
        'STS' => ['STS' => 'M|a|3'],
        'C601' => ['9015' => 'M|an|3'],
        'C555' => ['4405' => 'D|an|3'],
        'C556' => ['9013' => 'D|an|3', '1131' => 'D|an|17'],
    ];

    public static function fromAttributes($category, $reason, $code = null, $status = null)
    {
        return new static([
            'STS' => ['STS' => 'STS'],
            'C601' => ['9015' => $category],
            'C555' => ['4405' => $status],
            'C556' => ['9013' => $reason, '1131' => $code],
        ]);
    }

    public function category()
    {
        return $this->elements['C601']['9015'];
    }

    public function status()
    {
        return $this->elements['C555']['4405'];
    }

    public function reason()
    {
        return $this->elements['C556']['9013'];
    }

    public function code()
    {
        return $this->elements['C556']['1131'];
    }
}
