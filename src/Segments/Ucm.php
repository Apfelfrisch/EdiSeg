<?php

namespace Proengeno\Ediseg\Segments;

use Proengeno\Edifact\Templates\AbstractSegment;

class Ucm extends AbstractSegment
{
    protected static $validationBlueprint = [
        'UCM' => ['UCM' => 'M|an|3'],
        '0062' => ['0062' => 'M|an|14'],
        'S009' => ['0065' => 'M|an|6', '0052' => 'M|an|3', '0054' => 'M|an|3', '0051' => 'M|an|2', '0057' => 'M|an|6'],
        '0083' => ['0083' => 'M|n|1'],
        '0085' => ['0085' => 'M|n|2'],
        '0013' => ['0013' => 'M|a|3'],
        'S011' => ['0098' => 'M|n|3', '0104' => 'M|an|3'],
    ];

    public static function fromAttributes(
        $referenz,
        $type,
        $versionNumber,
        $releaseNumber,
        $organisation,
        $organisationCode,
        $error,
        $segmentPosition = null,
        $dataGroupPosition = null,
        $serviceSegement = null,
        $status = 4
    ) {
        return new static([
            'UCM' => ['UCM' => 'UCM'],
            '0062' => ['0062' => $referenz],
            'S009' => ['0065' => $type, '0052' => $versionNumber, '0054' => $releaseNumber, '0051' => $organisation, '0057' => $organisationCode],
            '0083' => ['0083' => $status],
            '0085' => ['0085' => $error],
            '0013' => ['0013' => $serviceSegement],
            'S011' => ['0098' => $segmentPosition, '0104' => $dataGroupPosition],
        ]);
    }

    public function referenz()
    {
        return $this->elements['0062']['0062'];
    }

    public function type()
    {
        return $this->elements['S009']['0065'];
    }

    public function versionNumber()
    {
        return $this->elements['S009']['0052'];
    }

    public function releaseNumber()
    {
        return $this->elements['S009']['0054'];
    }

    public function organisation()
    {
        return $this->elements['S009']['0051'];
    }

    public function organisationCode()
    {
        return $this->elements['S009']['0057'];
    }

    public function status()
    {
        return $this->elements['0083']['0083'];
    }

    /*
     * @Deprecated
     */
    public function error()
    {
        return $this->errorCode();
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

    public function dataGroupPosition()
    {
        return $this->elements['S011']['0104'];
    }
}
