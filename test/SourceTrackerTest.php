<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:08 PM
 */

class SourceTrackerTest extends PHPUnit_Framework_TestCase {

  public function testSourceTracker() {
    $api = new \CallRail\CallRail($_ENV['token']);

    $cr = $api->companies();

    $this->assertTrue($cr->isSuccess());

    $company = $cr->getBody()->current();

    $response = $api->sourceTrackers($company->id);

    $this->assertTrue($response->isSuccess());

    $tracker = $response->getBody();

    $this->assertInstanceOf('CallRail\\Tracker\\Source\\Collection\\SourceTrackerCollection', $tracker);

    $this->assertNotEmpty($tracker);
  }
}
