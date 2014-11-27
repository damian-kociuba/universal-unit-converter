<?php

namespace Polcode\UnitConverterBundle\Structures;

/**
 * Category of unit is for example: length, mass, money...
 *
 * @author Damian Kociuba
 */
class UnitCategory {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function equal(self $other) {
        return $this->name == $other->name;
    }
    
}
