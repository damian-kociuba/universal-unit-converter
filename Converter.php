<?php

namespace Polcode\UnitConverterBundle;

use Polcode\UnitConverterBundle\Structures\ValueUnit;
use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\UnitsRepository\UnitsRepository;

/**
 * Description of Converter
 *
 * @author Damian Kociuba
 */
class Converter {

    /**
     *
     * @var UnitsRepository
     */
    private $unitsRepository;

    public function __construct(UnitsRepository $unitsRepository) {
        $this->unitsRepository = $unitsRepository;
    }

    /**
     * @param ValueUnit $sourceValueUnit
     * @param string $destinationUnitSymbolOrSynonym
     * @return ValueUnit
     * @throws InvalidArgumentException when unit isn't in repository OR when units are from diffrent category
     */
    public function convertValueToUnit(ValueUnit $sourceValueUnit, $destinationUnitSymbolOrSynonym) {
        $destinationUnit = $this->unitsRepository->findUnitBySymbolOrSynonym($destinationUnitSymbolOrSynonym);
        if ($destinationUnit === null) {
            throw new \InvalidArgumentException('UnitConverter. Unknow unit: ' . $destinationUnitSymbolOrSynonym);
        }

        if (!$sourceValueUnit->getUnit()->getCategory()->equal($destinationUnit->getCategory())) {
            throw new \InvalidArgumentException(
            strtr('Cannot convert :source_unit to :destination_unit', array(
                ':source_unit' => $sourceValueUnit->getUnit()->getSymbol(),
                ':destination_unit' => $destinationUnit->getSymbol()
                    )
            ));
        }

        $standardUnitValue = $sourceValueUnit->getUnit()->getConversionMethod()->calculateValueToStandardUnit($sourceValueUnit->getValue());  

        $destinationUnitValue = $destinationUnit->getConversionMethod()->calculateValueFromStandardUnit($standardUnitValue);

        return new ValueUnit($destinationUnitValue, $destinationUnit);
    }

}
