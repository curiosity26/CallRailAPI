<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:42 PM
 */

namespace CallRail\Tracker\Session\Collection;


use RESTKit\Collection\Collection;

class SessionTrackerCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\Tracker\\Session\\SessionTracker';
  }
}