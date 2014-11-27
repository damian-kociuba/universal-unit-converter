<?php

namespace Polcode\UnitConverterBundle\Structures;

/**
 * @author Damian Kociuba
 */
class ValueUnit {

    /**
     * @var float
     */
    private $value;

    /**
     * @var Unit
     */
    private $unit;

    public function __construct($value, Unit $unit) {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return Unit
     */
    public function getUnit() {
        return $this->unit;
    }

    public function getAsStringWithUnitSymbol() {
        return $this->value . $this->unit->getSymbol();
    }
}
