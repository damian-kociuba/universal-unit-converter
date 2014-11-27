UniversalUnitConverter
======================

Instalation
-----------

1. Add to your composer.json:
        
        [...]
        "require" : {
            [...]
            "company/demobundle" : "dev-master"
        },
        "repositories" : [{
            "type" : "vcs",
            "url" : "https://github.com/Company/DemoBundle.git"
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

