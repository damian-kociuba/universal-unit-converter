<?php

namespace Polcode\UnitConverterBundle\ConversionMethod;

/**
 * @author Damian Kociuba
 */
interface IConversionMethod {

    public function calculateValueFromStandardUnit($standardUnitValue);

    public function calculateValueToStandardUnit($nonStandardUnitValue);
}
