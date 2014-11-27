<?php

namespace Polcode\UnitConverterBundle\ConversionMethod;

use Polcode\UnitConverterBundle\Math\EvalMath;
/**
 * @author Damian Kociuba
 */
class ConversionByFormula implements IConversionMethod {

    /**
     * @var string
     */
    private $formulaToStandardUnitValue;

    /**
     * @var string
     */
    private $formulaFromStandardUnitValue;

    /**
     * @var EvalMath
     */
    private $evalMath;
    /**
     * 
     * @param string $formula
     */
    public function __construct($formulaToStandardUnitValue, $formulaFromStandardUnitValue) {
        $this->formulaToStandardUnitValue = $formulaToStandardUnitValue;
        $this->formulaFromStandardUnitValue = $formulaFromStandardUnitValue;
        $this->evalMath = new EvalMath();
    }

    public function calculateValueFromStandardUnit($standardUnitValue) {
        
        $this->evalMath->evaluate('x = ' . $standardUnitValue);
        $result = $this->evalMath->evaluate($this->formulaFromStandardUnitValue);
        return $result;
    }

    public function calculateValueToStandardUnit($nonStandardUnitValue) {
        $this->evalMath->evaluate('x = ' . $nonStandardUnitValue);
        $result = $this->evalMath->evaluate($this->formulaToStandardUnitValue);
        return $result;
    }

}
