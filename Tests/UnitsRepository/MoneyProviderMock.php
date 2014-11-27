<?php

namespace Polcode\UnitConverterBundle\Tests\UnitsRepository;

use Polcode\UnitConverterBundle\UnitsRepository\Providers\IUnitsProvider;
use Polcode\UnitConverterBundle\Structures\Unit;
use Polcode\UnitConverterBundle\Structures\UnitCategory;
use Polcode\UnitConverterBundle\ConversionMethod\ConversionByScale;

/**
 * @author Damian Kociuba
 */
class MoneyProviderMock implements IUnitsProvider {
    public function getUnits() {
        $moneyCategory = new UnitCategory('money');
        $dolar = new Unit('$', new ConversionByScale(1), $moneyCategory);
        $pound = new Unit('£', new ConversionByScale(1.56801), $moneyCategory);
        
        return array($dolar, $pound);
    }

}
