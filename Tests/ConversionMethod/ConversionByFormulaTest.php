<?php

namespace Polcode\UnitConverterBundle\Tests\ConversionMethod;

use Polcode\UnitConverterBundle\ConversionMethod\ConversionByFormula;

/**
 * @author Damian Kociuba
 */
class ConversionByFormulaTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ConversionByFormula
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ConversionByFormula('x+273.15', 'x-273.15'); //for egzample °C
    }

    public function testCalculateValueFromStandardUnit() {
        $this->assertEquals(-173.15, $this->object->calculateValueFromStandardUnit(100));
    }

    public function testCalculateValueToStandardUnit() {
        $this->assertEquals(373.15, $this->object->calculateValueToStandardUnit(100));
    }

}
