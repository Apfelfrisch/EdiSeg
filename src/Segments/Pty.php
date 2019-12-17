<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Pty extends AbstractSegment
{
    protected static $validationBlueprint = [
        'PTY' => ['PTY' => 'M|a|3'],
        '4035' => ['4035' => 'M|n|3'],
        'C585' => ['4037' => null, '1131' => null, '3055' => null, '4036' => 'M|n|35'],
    ];

    public static function fromAttributes($qualifier, $priority)
    {
        return new static([
            'PTY' => ['PTY' => 'PTY'],
            '4035' => ['4035' => $qualifier],
            'C585' => ['4036' => $priority],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['4035']['4035'];
    }

    public function priority()
    {
        return $this->elements['C585']['4036'];
    }
}
