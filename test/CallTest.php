<?php

/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 4:24 PM
 */
class CallTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        date_default_timezone_set('America/New_York');
    }

    public function testCall()
    {
        $api = new \CallRail\CallRail($_ENV['token']);

        $cr = $api->companies();

        $this->assertTrue($cr->isSuccess());

        $company = $cr->getBody()->current();

        $response = $api->calls($company->id);

        $this->assertTrue($response->isSuccess());

        $calls = $response->getBody();

        $this->assertInstanceOf('CallRail\\Call\\Collection\\CallCollection', $calls);
        $this->assertNotEmpty($calls);
    }
}
