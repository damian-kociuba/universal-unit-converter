<?php

namespace Polcode\UnitConverterBundle\UnitsRepository\Providers;

use Symfony\Component\Yaml\Parser;
use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\Structures\UnitCategory;
use Polcode\UnitConverterBundle\ConversionMethod\ConversionByScale;
use Polcode\UnitConverterBundle\ConversionMethod\ConversionByFormula;

/**
 * @author Damian Kociuba
 */
class BasicUnitsProvider implements IUnitsProvider {

    /**
     * @var Unit[]
     */
    private $units = array();

    public function __construct() {
        $yaml = new Parser();
        $configFilePath = __DIR__ . '/../../Resources/config/UnitsProvider/basicUnitsProviderConfig.yml';

        $dataFromConfig = $yaml->parse(file_get_contents($configFilePath));
        $this->createUnitsFromConfigData($dataFromConfig);
    }

    private function createUnitsFromConfigData($dataFromConfig) {
        $configUnits = $dataFromConfig['units'];
        foreach ($configUnits as $oneConfigUnit) {
            $category = $this->createCategoryFromConfigData($oneConfigUnit['category']);
            $conversionMethod = $this->createConversionMethodFromConfigData($oneConfigUnit['conversionMethod']);
            $unit = new Unit($oneConfigUnit['symbol'], $conversionMethod, $category);
            $unit->addSynonyms($oneConfigUnit['synonyms']);
            $this->units[] = $unit;
        }
    }

    private function createCategoryFromConfigData(array $configData) {
        return new UnitCategory($configData['name']);
    }

    private function createConversionMethodFromConfigData(array $configData) {
        switch ($configData['type']) {
            case 'byScale': return new ConversionByScale($configData['standartUnitScale']);
            case 'byFormula': return new ConversionByFormula($configData['formulaToStandardUnitValue'], $configData['formulaFromStandardUnitValue']);
        }
        throw new Exception('Unknow conversion method type: ' . $configData['type']);
    }

    public function getUnits() {
        return $this->units;
    }

}
