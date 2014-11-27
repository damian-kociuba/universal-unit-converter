<?php

namespace Polcode\UnitConverterBundle\Tests\ConversionMethod;

use Polcode\UnitConverterBundle\ConversionMethod\ConversionByScale;

/**
 * Description of ConversionByScaleTest
 *
 * @author Damian Kociuba
 */
class ConversionByScaleTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ValueUnitFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ConversionByScale(0.01); //for egzample cm
    }

    public function testCalculateValueFromStandardUnit() {
        $this->assertEquals(3300, $this->object->calculateValueFromStandardUnit(33));
    }

    public function testCalculateValueToStandardUnit() {
        $this->assertEquals(0.33, $this->object->calculateValueToStandardUnit(33));
    }

}
