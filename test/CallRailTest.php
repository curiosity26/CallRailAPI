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

    $response = $api->companies();
    $this->assertInstanceOf('\\CallRail\\Company\\Response\\CompanyResponse', $response);
    $companies = $response->getBody();
    $this->assertNotEmpty($companies);

    return $companies->current()->id;
  }

  /**
   * @param $id
   * @depends testCompanies
   */
  public function testSingleCompany($id) {
    $api = new \CallRail\CallRail($_ENV['token']);

    $response = $api->companies($id);
    $this->assertInstanceOf('\\CallRail\\Company\\Response\\CompanyResponse', $response);
    $company = $response->getBody();

    $this->assertInstanceOf(
      '\\CallRail\\Company\\Company', $company
    );
  }
}
