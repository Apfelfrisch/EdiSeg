<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Erc extends AbstractSegment
{
    protected static $validationBlueprint = [
        'ERC' => ['ERC' => 'M|a|3'],
        'C901' => ['9321' => 'M|an|8'],
    ];

    public static function fromAttributes($error)
    {
        return new static([
            'ERC' => ['ERC' => 'ERC'],
            'C901' => ['9321' => $error],
        ]);
    }

    public function errorCode()
    {
        return $this->elements['C901']['9321'];
    }
}
