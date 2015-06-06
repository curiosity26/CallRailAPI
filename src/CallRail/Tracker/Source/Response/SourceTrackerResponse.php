<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:02 PM
 */

namespace CallRail\Tracker\Source\Response;


use CallRail\Response\CallRailResponse;

class SourceTrackerResponse extends CallRailResponse {

  public function getCollectionClass() {
    return 'CallRail\\Tracker\\Source\\Collection\\SourceTrackerCollection';
  }

  public function getCollectionField() {
    return 'source_trackers';
  }
}