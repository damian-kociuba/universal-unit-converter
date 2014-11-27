<?php

namespace Polcode\UnitConverterBundle\Tests\UnitsRepository;

use Polcode\UnitConverterBundle\UnitsRepository\Providers\IUnitsProvider;
use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\Structures\UnitCategory;
use Polcode\UnitConverterBundle\ConversionMethod\ConversionByScale;

/**
 * @author Damian Kociuba
 */
class BasicUnitsProviderMock implements IUnitsProvider {

    public function getUnits() {
        $lengthCategory = new UnitCategory('length');
        $cm = new Unit('cm', new ConversionByScale(0.01), $lengthCategory);
        $cm->addSynonyms(array('centimetre', 'centimetres', 'centimeter', 'centimeters'));
        $m = new Unit('m', new ConversionByScale(1), $lengthCategory);
        $m->addSynonyms(array('metre', 'metres', 'meter', 'meters'));
        $km = new Unit('km', new ConversionByScale(1000), $lengthCategory);
        $km->addSynonyms(array('kilometre', 'kilometres', 'kilometer', 'kilometers'));
        return array($cm, $m, $km);
    }

}
