UniversalUnitConverter
======================

Instalation
-----------

1. Add to your composer.json:
        
        [...]
        "require" : {
            [...]
            "Polcode/UnitConverterBundle" : "dev-master"
        },
        "repositories" : [{
            "type" : "vcs",
            "url" : "https://github.com/damian-kociuba/universal-unit-converter.git"
        }],
        [...]

2. Run:
        
        php composer.phar update Polcode/UnitConverterBundle

3. Add to your app/AppKernel.php

        $bundles = array(
            [...]
            new Polcode\UnitConverterBundle\PolcodeUnitConverterBundle(),
        );

4. Add to your app/config/config.yml

        imports:
            [...]
            - { resource: "@PolcodeUnitConverterBundle/Resources/config/services.yml" }

Basic usage
-----------

        $converter = $this->get('unit_converter');
        echo $converter->convertFromToAsNumber(41, '°F', '°C'); // 5

You can use full names of units:

        $converter = $this->get('unit_converter');
        echo $converter->convertFromToAsNumber(100, 'kilograms', 'pounds'); //220.46226218488

Adding units
------------

There are two ways to define conversion method between
Basic units are readed from vendor/Polcode/UnitConverterBundle/Resources/config/UnitProvider. 
Each unit have symbol, conversion method, category and list of synonyms. When you want to get unit,
you can use symbol or one of synonims. To convert units, they moust have the same category name.

Conversin method is little more complicated. There are two posibilites to define it: 
by scale or by formula. Use Scale method when conversion is implemented by multiplication 
e.g cm <-> m (* 0.01), and formula to other cases.

To add simple units write they definitions in configuration file. 

        hour:
            symbol: "h"
            conversionMethod:
                type: "byScale"
                standartUnitScale: 3600 # let's assume basic unit is second
            category: 
                name: "length"
            synonyms:
                - "hour"
                - "hours"

        hour:
            symbol: "s"
            conversionMethod:
                type: "byScale"
                standartUnitScale: 1 # let's assume basic unit is second
            category: 
                name: "length"
            synonyms:
                - "second"
                - "seconds"

Now it is posible to convert between second and hours.

Adding specific unit provider
-----------------------------

When you neet conversion between currencies, you should write own units provider, which well be
update exchange rate e.g every day.

Add your provider class and implement interface from vendor/Polcode/UnitConverterBundle/UnitsRepository/Providers/IUnitsProvider.php.
Then add reference in vendor/Polcode/UnitConverterBundle/Resources/config/services.yml to your new provider.
There is example in this file.

