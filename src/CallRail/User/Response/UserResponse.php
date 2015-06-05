<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 6:47 PM
 */

namespace CallRail\User\Response;


use CallRail\Response\CallRailResponse;

class UserResponse extends CallRailResponse {

  public function getCollectionClass() {
    return 'CallRail\\User\\Collection\\UserCollection';
  }

  public function getCollectionField() {
    return 'users';
  }
}