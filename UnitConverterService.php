<?php

namespace Polcode\UnitConverterBundle;

use Polcode\UnitConverterBundle\UnitsRepository\Providers\IUnitsProvider;
use Polcode\UnitConverterBundle\UnitsRepository\UnitsRepository;
use Polcode\UnitConverterBundle\Factory\ValueUnitFactory;
use Polcode\UnitConverterBundle\Converter;

/**
 * @author Damian Kociuba
 */
class UnitConverterService {
    
    /**
     *
     * @var IUnitsProvider[];
     */
    private $unitsProviders;
    
    /**
     * 
     * @param IUnitsProvider[] $providers
     */
    public function __construct(array $providers) {
        $this->unitsProviders = $providers;
    }
    /**
     * @param type $sourceValue
     * @param type $sourceUnit
     * @param type $destinationUnit
     * @return Structures\ValueUnit;
     */
    public function convertFromToAsObject($sourceValue, $sourceUnit, $destinationUnit) {
        $unitRepository = new UnitsRepository($this->unitsProviders);
        $valueUnitFactory = new ValueUnitFactory($unitRepository);
        $converter = new Converter($unitRepository);
        
        $sourceValueUnit = $valueUnitFactory->createValue($sourceValue, $sourceUnit);
        
        $destinationValueUnit = $converter->convertValueToUnit($sourceValueUnit, $destinationUnit);
        
        return $destinationValueUnit;
    }
    
    public function convertFromToAsNumber($sourceValue, $sourceUnit, $destinationUnit) {
        
        return $this->convertFromToAsObject($sourceValue, $sourceUnit, $destinationUnit)->getValue();
    }
}
