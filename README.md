UniversalUnitConverter
======================

Instalation
-----------

Basic usage
-----------

        $converter = $this->get('unit_converter');
        echo $converter->convertFromToAsNumber(41, '°F', '°C'); // 5

You can use full names of units:

        $converter = $this->get('unit_converter');
        echo $converter->convertFromToAsNumber(100, 'kilograms', 'pounds'); //220.46226218488

