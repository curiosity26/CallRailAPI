<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 7:29 PM
 */

class UserTest extends PHPUnit_Framework_TestCase {

  public function testUsers() {
    $api = new \CallRail\CallRail($_ENV['token']);

    $response = $api->users();

    $this->assertInstanceOf('CallRail\\User\\Response\\UserResponse', $response);
    $this->assertTrue($response->isSuccess());

    $users = $response->getBody();

    $this->assertInstanceOf('CallRail\\User\\Collection\\UserCollection', $users);
    $this->assertNotEmpty($users);

    return $users->current()->id;
  }

  /**
   * @param $id
   * @depends testUsers
   */
  public function testSingleUser($id) {
    $api = new \CallRail\CallRail($_ENV['token']);

    $response = $api->users($id);
    $this->assertInstanceOf('CallRail\\User\\Response\\UserResponse', $response);

    $user = $response->getBody();

    $this->assertInstanceOf('CallRail\\User\\User', $user);
  }
}
