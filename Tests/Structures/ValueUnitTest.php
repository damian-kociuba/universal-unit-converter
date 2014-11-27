<?php

namespace Polcode\UnitConverterBundle\Test\Structures;

use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\Structures\ValueUnit;
use Polcode\UnitConverterBundle\Structures\UnitCategory;
use Polcode\UnitConverterBundle\ConversionMethod\ConversionByScale;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-11-25 at 09:07:42.
 */
class ValueUnitTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ValueUnit
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $category = new UnitCategory('volume');
        $litre = new Unit('l', new ConversionByScale(0.001), $category);
        $this->object = new ValueUnit(10.52, $litre);
    }

    public function testGetValue() {
        $this->assertEquals(10.52, $this->object->getValue());
    }

    public function testGetUnit() {
        $unit = $this->object->getUnit();
        $this->assertEquals('l', $unit->getSymbol());
    }

}
