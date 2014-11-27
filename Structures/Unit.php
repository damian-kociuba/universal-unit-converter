<?php

namespace Polcode\UnitConverterBundle\Structures;

use Polcode\UnitConverterBundle\ConversionMethod\IConversionMethod;

/**
 * @author Damian Kociuba
 */
class Unit {

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var IConversionMethod
     */
    private $conversionMethod;

    /**
     * @var UnitCategory
     */
    private $category;

    /**
     * @var array
     */
    private $synonyms = array();

    /**
     * @param string $symbol
     * @param float $conversionMethod
     * @param \Polcode\UnitConverterBundle\Structures\UnitCategory $category
     */
    public function __construct($symbol, IConversionMethod $conversionMethod, UnitCategory $category) {
        $this->symbol = $symbol;
        $this->conversionMethod = $conversionMethod;
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getSymbol() {
        return $this->symbol;
    }

    /**
     * @return IConversionMethod
     */
    public function getConversionMethod() {
        return $this->conversionMethod;
    }

    /**
     * @return UnitCategory
     */
    public function getCategory() {
        return $this->category;
    }

    public function addSynonyms(array $synonyms) {
        //add new synonym
        $this->synonyms = array_merge($this->synonyms, $synonyms);
    }

    public function hasSynonym($synonym) {
        return in_array($synonym, $this->synonyms);
    }

}
