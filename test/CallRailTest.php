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
    $this->assertInstanceOf('\\RESTKit\\Collection\\Collection', $companies->companies);

    $id = $companies->companies->current()->id;

    $company = $api->companies($id);

    $this->assertInstanceOf(
      '\\RESTKit\\DynamicDataObject', $company
    );

  }
}
