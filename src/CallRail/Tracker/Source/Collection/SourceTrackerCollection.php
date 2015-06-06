<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:01 PM
 */

namespace CallRail\Tracker\Source\Collection;


use RESTKit\Collection\Collection;

class SourceTrackerCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\Tracker\\Source\\SourceTracker';
  }
}