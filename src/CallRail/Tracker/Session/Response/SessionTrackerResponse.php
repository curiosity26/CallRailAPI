<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:45 PM
 */

namespace CallRail\Tracker\Session\Response;


use CallRail\Response\CallRailResponse;

class SessionTrackerResponse extends CallRailResponse {

  public function getCollectionClass() {
    return 'CallRail\\Tracker\\Session\\Collection\\SessionTrackerCollection';
  }

  public function getCollectionField() {
    return 'session_trackers';
  }
}