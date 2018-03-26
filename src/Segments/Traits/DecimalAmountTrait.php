<?php

namespace Proengeno\Ediseg\Segments\Traits;

trait DecimalAmountTrait
{
    private $validDecimal = '.';

    private function replaceToValidDecimal($value)
    {
        return str_replace(
            static::getBuildDelimiter()->getDecimal(),
            $this->validDecimal,
            $value
        );
    }
}
