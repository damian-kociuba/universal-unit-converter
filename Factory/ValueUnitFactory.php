<?php

namespace Polcode\UnitConverterBundle\Factory;

use Polcode\UnitConverterBundle\UnitsRepository\UnitsRepository;
use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\Structures\ValueUnit;

/**
 * Description of UnitFactory
 *
 * @author Damian Kociuba
 */
class ValueUnitFactory {

    /**
     * @var UnitsRepository
     */
    private $unitsRepository;

    public function __construct(UnitsRepository $unitsRepository) {
        $this->unitsRepository = $unitsRepository;
    }

    /**
     * @param float $value
     * @param string $unitSymbolOrSynonym
     * @return ValueUnit
     * @throws InvalidArgumentException when unit isn't in repository
     */
    public function createValue($value, $unitSymbolOrSynonym) {
        $unit = $this->unitsRepository->findUnitBySymbolOrSynonym($unitSymbolOrSynonym);
        if($unit === null) {
            throw new \InvalidArgumentException('Unknow unit: '. $unitSymbolOrSynonym);
        }
        
        return new ValueUnit($value, $unit);
    }

}
