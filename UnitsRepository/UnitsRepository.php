<?php

namespace Polcode\UnitConverterBundle\UnitsRepository;

use Polcode\UnitConverterBundle\UnitsRepository\Providers\IUnitsProvider;
use Polcode\UnitConverterBundle\Structures\Unit;

/**
 * @author Damian Kociuba
 */
class UnitsRepository {

    /**
     * @var IUnitsProvider[]
     */
    private $unitsProviders;

    /**
     * @var Unit
     */
    private $availableUnits = array();

    public function __construct(array $unitsProviders) {
        $this->unitsProviders = $unitsProviders;
        
        $this->loadUnits();
    }

    private function loadUnits() {
        foreach($this->unitsProviders as $provider) {
            $this->availableUnits = array_merge($this->availableUnits, $provider->getUnits());
        }
    }

    /**
     * @param string $symbolOrSynonym
     * @return boolean
     */
    public function hasUnitBySymbolOrSynonym($symbolOrSynonym) {
        if ($this->findUnitBySymbolOrSynonym($symbolOrSynonym) === null) {
            return false;
        }
        return true;
    }

    /**
     * return null, if not found
     * @param string $symbolOrSynonym
     * @return Unit
     */
    public function findUnitBySymbolOrSynonym($symbolOrSynonym) {
        foreach ($this->availableUnits as $unit) {
            if ($unit->getSymbol() === $symbolOrSynonym || $unit->hasSynonym($symbolOrSynonym)) {
                return $unit;
            }
        }
        return null;
    }

}
