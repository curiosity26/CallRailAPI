<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 11:31 PM
 */

namespace CallRail\CallFlow\Collection;


use RESTKit\Collection\Collection;

class StepCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\CallFlow\\Step';
  }
}