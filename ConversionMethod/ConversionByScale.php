<?php

namespace Polcode\UnitConverterBundle\ConversionMethod;

/**
 * @author Damian Kociuba
 */
class ConversionByScale implements IConversionMethod {

    private $scaleToStandartUnit;

    public function __construct($scaleToStandartUnit) {
        $this->scaleToStandartUnit = $scaleToStandartUnit;
    }
    public function calculateValueFromStandardUnit($standardUnitValue) {
        return $standardUnitValue / $this->scaleToStandartUnit;
    }

    public function calculateValueToStandardUnit($nonStandardUnitValue) {
        return $nonStandardUnitValue * $this->scaleToStandartUnit;
    }

}
