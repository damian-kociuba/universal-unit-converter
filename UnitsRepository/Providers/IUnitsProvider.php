<?php

namespace Polcode\UnitConverterBundle\UnitsRepository\Providers;

/**
 * @author Damian Kociuba
 */
interface IUnitsProvider {
    /**
     * return \Polcode\UnitConverterBundle\Structures\Unit[]
     */
    public function getUnits();
}
