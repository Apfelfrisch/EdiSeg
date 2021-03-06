<?php

namespace Proengeno\Ediseg\Segments;

use DateTime;
use Proengeno\Edifact\Templates\AbstractSegment;
use Proengeno\Edifact\Exceptions\SegValidationException;

class Dtm extends AbstractSegment
{
    protected static $validationBlueprint = [
        'DTM' => ['DTM' => 'M|a|3'],
        'C507' => ['2005' => 'M|an|3', '2380' => 'M|an|35', '2379' => 'M|an|3'],
    ];

    public static function fromAttributes($qualifier, $date, $code)
    {
        if ($date instanceof DateTime) {
            $date = static::serializeDateTime($date, $code);
        }

        return new static([
            'DTM' => ['DTM' => 'DTM'],
            'C507' => ['2005' => $qualifier, '2380' => $date, '2379' => $code],
        ]);
    }

    public function qualifier()
    {
        return $this->elements['C507']['2005'];
    }

    public function date()
    {
        return $this->buildDate($this->rawDate(), $this->code());
    }

    public function rawDate()
    {
        return $this->elements['C507']['2380'];
    }

    public function code()
    {
        return $this->elements['C507']['2379'];
    }

    private static function serializeDateTime($date, $code)
    {
        switch ($code) {
            case 102:
               return $date->format('Ymd');
            case 106:
               return $date->format('md');
            case 203:
               return $date->format('YmdHi');
            case 303:
                return $date->format('YmdHi') . substr($date->format('O'), 0, 3);
            case 602:
                return $date->format('Y');
            case 610:
                return $date->format('Ym');
        }

        throw SegValidationException::forKeyValue('DTM', $code, "Timecode doesnt Support DateTime or is unknown.");
    }

    private function buildDate($string, $code)
    {
        switch ($code) {
            case 102:
                // If no time is set, it takes the creation time. We dont want that
                $hour = 0;
                return DateTime::createFromFormat('YmdH', $string.$hour);
            case 106:
                // If no time is set, it takes the creation time. We dont want that
                $hour = 0;
                return DateTime::createFromFormat('mdH', $string.$hour);
            case 203:
                return DateTime::createFromFormat('YmdHi', $string);
            case 303:
                return DateTime::createFromFormat('YmdHi', substr($string, 0, -3));
            case 602:
                $month = '01';
                $day = '01';
                $hour = 0;
                return DateTime::createFromFormat('YmdH', $string.$month.$day.$hour);
            case 610:
                $day = '01';
                $hour = 0;
                return DateTime::createFromFormat('YmdH', $string.$day.$hour);
            case 802:
            case 'Z01':
                return $string;
        }

        throw SegValidationException::forKeyValue('DTM', $code, "Timecode unknown.");
    }

    protected function getGetterMethods()
    {
        return [
            'qualifier',
            'rawDate',
            'code',
        ];
    }
}
