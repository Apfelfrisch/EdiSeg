<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Uci extends AbstractSegment
{
    protected static $validationBlueprint = [
        'UCI' => ['UCI' => 'M|an|3'],
        '0020' => ['0020' => 'M|an|14'],
        'S002' => ['0004' => 'M|an|35', '0007' => 'M|an|3'],
        'S003' => ['0010' => 'M|an|35', '0007' => 'M|an|3'],
        '0083' => ['0083' => 'M|n|1'],
        '0085' => ['0085' => 'O|n|2']
    ];

    public static function fromAttributes(
        $unbRef,
        $sender,
        $senderCode,
        $receiver,
        $receiverCode,
        $statusCode,
        $errorCode = null,
        $serviceSegement = null,
        $segmentPosition = null,
        $elementPosition = null
    )
    {
        return new static([
            'UCI' => ['UCI' => 'UCI'],
            '0020' => ['0020' => $unbRef],
            'S002' => ['0004' => $sender, '0007' => $senderCode],
            'S003' => ['0010' => $receiver, '0007' => $receiverCode],
            '0083' => ['0083' => $statusCode],
            '0085' => ['0085' => $errorCode],
            '0013' => ['0013' => $serviceSegement],
            'S011' => ['0098' => $segmentPosition, '0104' => $elementPosition],
        ]);
    }

    public function unbRef()
    {
        return $this->elements['0020']['0020'];
    }

    public function sender()
    {
        return $this->elements['S002']['0004'];
    }

    public function senderCode()
    {
        return $this->elements['S002']['0007'];
    }

    public function receiver()
    {
        return $this->elements['S003']['0010'];
    }

    public function receiverCode()
    {
        return $this->elements['S003']['0007'];
    }

    public function statusCode()
    {
        return $this->elements['0083']['0083'];
    }

    public function errorCode()
    {
        return $this->elements['0085']['0085'];
    }

    public function serviceSegement()
    {
        return $this->elements['0013']['0013'];
    }

    public function segmentPosition()
    {
        return $this->elements['S011']['0098'];
    }

    public function elementPosition()
    {
        return $this->elements['S011']['0104'];
    }
}
