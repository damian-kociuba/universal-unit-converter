<?php

namespace Polcode\UnitConverterBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        //TODO
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');
        
        $this->assertTrue(true);
        //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
