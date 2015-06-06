<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:48 PM
 */

class SessionTrackerTest extends PHPUnit_Framework_TestCase {

  public function testSessionTracker() {
    $api = new \CallRail\CallRail($_ENV['token']);

    $cr = $api->companies();

    $this->assertTrue($cr->isSuccess());

    $company = $cr->getBody()->current();

    $response = $api->sessionTrackers($company->id);

    $this->assertTrue($response->isSuccess());

    $tracker = $response->getBody();

    if (method_exists($tracker, 'count')) {
      $this->assertInstanceOf('CallRail\\Tracker\\Session\\Collection\\SessionTrackerCollection', $tracker);
      $this->assertNotEmpty($tracker);
    }
    else {
      $this->assertInstanceOf('CallRail\\Tracker\\Session\\SessionTracker', $tracker);
    }
  }
}
