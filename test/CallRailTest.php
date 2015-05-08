<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 5/7/15
 * Time: 8:23 PM
 */

class CallRailTest extends PHPUnit_Framework_TestCase {

  public function testCompanies() {
    $api = new \CallRail\CallRail($_ENV['token']);

    $companies = $api->companies();
    $this->assertNotEmpty($companies);
  }
}
