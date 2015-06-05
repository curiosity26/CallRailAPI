<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 7:46 PM
 */

namespace CallRail\Source\Response;


use CallRail\Response\CallRailResponse;

class SourceResponse extends CallRailResponse {

  public function getCollectionClass() {
    return 'CallRail\\Source\\Collection\\SourceCollection';
  }

  public function getCollectionField() {
    return 'sources';
  }
}