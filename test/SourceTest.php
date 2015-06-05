<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 7:50 PM
 */

class SourceTest extends PHPUnit_Framework_TestCase {

  /**
   * @return \CallRail\Source\Collection\SourceCollection
   */
  public function testSources() {
    $api = new \CallRail\CallRail($_ENV['token']);

    $response = $api->sources();

    $this->assertInstanceOf('CallRail\\Source\\Response\\SourceResponse', $response);
    $this->assertTrue($response->isSuccess());

    $sources = $response->getBody();

    $this->assertInstanceOf('CallRail\\Source\\Collection\\SourceCollection', $sources);
    $this->assertNotEmpty($sources);

    return $sources;
  }

  /**
   * @param $sources \CallRail\Source\Collection\SourceCollection
   * @depends testSources
   */
  public function testSourceByCompany($sources) {
    $api = new \CallRail\CallRail($_ENV['token']);

    $first = $sources->current();
    $response = $api->sources($first->company_id);

    $new = $response->getBody();

    if ($new instanceof \Iterator) {
      $this->assertInstanceOf('CallRail\\Source\\Collection\\SourceCollection', $new);
      $this->assertNotEmpty($sources);
    }
    else {
      $this->assertInstanceOf('CallRail\\Source\\Source', $new);
    }

  }
}
