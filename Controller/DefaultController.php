<?php

namespace Polcode\UnitConverterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function convertAction($sourceValue, $sourceUnit, $destinationUnit) {
        $converter = $this->get('unit_converter');
        $destinationValueUnit = $converter->convertFromToAsObject($sourceValue, $sourceUnit, $destinationUnit);
        $content = $sourceValue . $sourceUnit;
        $content .= ' = ';
        $content .= $destinationValueUnit->getAsStringWithUnitSymbol();
        return new \Symfony\Component\HttpFoundation\Response($content);
    }
}
