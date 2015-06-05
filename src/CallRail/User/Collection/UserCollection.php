<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 6:46 PM
 */

namespace CallRail\User\Collection;


use RESTKit\Collection\Collection;

class UserCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\User\\User';
  }
}