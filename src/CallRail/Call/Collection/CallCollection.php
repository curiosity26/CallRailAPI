<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 4:09 PM
 */

namespace CallRail\Call\Collection;


use RESTKit\Collection\Collection;

class CallCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\Call\\Call';
  }
}