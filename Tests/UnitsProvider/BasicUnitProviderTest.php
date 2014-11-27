<?php

namespace Polcode\UnitConverterBundle\Tests\UnitsProvider;

use Polcode\UnitConverterBundle\UnitsRepository\Providers\BasicUnitsProvider;

/**
 * Description of BasicUnitProviderTest
 *
 * @author dkociuba
 */
class BasicUnitProviderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \Polcode\UnitConverterBundle\Structures\Unit[]
     */
    private $units;

    public function SetUp() {
        $unitsProvider = new BasicUnitsProvider();
        $this->units = $unitsProvider->getUnits();
    }

    public function testUnitsAreArray() {
        $this->assertTrue(is_array($this->units));
    }

    public function testConsistUnits() {
        $unitSymbols = $this->getSymbolsFromUnits($this->units);

        $this->assertTrue(in_array('m', $unitSymbols));
        $this->assertTrue(in_array('cm', $unitSymbols));
        $this->assertFalse(in_array('wrongSymbol', $unitSymbols));
    }

    private function getSymbolsFromUnits(array $units) {
        $unitSymbols = array();
        foreach ($units as $oneUnit) {
            $unitSymbols[] = $oneUnit->getSymbol();
        }
        return $unitSymbols;
    }

    public function testUnitsConsistSynonyms() {
        foreach ($this->units as $oneUnit) {
            $synonyms = array();
            switch ($oneUnit->getSymbol()) {
                case 'm' : $synonyms = array('metre', 'metres', 'meter', 'meters');
                    break;
                case 'cm' : $synonyms = array('centimetre', 'centimetres', 'centimeter', 'centimeters');
                    break;
            }
            foreach($synonyms as $oneSynonym) {
                $this->assertTrue($oneUnit->hasSynonym($oneSynonym));
            }
        }
    }

    public function testConversionMethod() {
        $foundCelcius = false;
        foreach ($this->units as $oneUnit) {
            if($oneUnit->hasSynonym('celsius')) {
                $this->assertEquals(-173.15, $oneUnit->getConversionMethod()->calculateValueFromStandardUnit(100));
                $this->assertEquals(373.15, $oneUnit->getConversionMethod()->calculateValueToStandardUnit(100));
                $foundCelcius = true;
            }
        }
        $this->assertTrue($foundCelcius);
    }
}
