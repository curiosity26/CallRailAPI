<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 10:58 PM
 */

namespace CallRail\Tracker\Source;


use RESTKit\DynamicDataObject;
use RESTKit\Properties\ClassProperty;
use RESTKit\Properties\StringProperty;

class SourceTracker extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('name', new StringProperty())
      ->createProperty('call_flow', new ClassProperty('RESTKit\\DynamicDataObject'))
      ->createProperty('tracking_number', new ClassProperty('RESTKit\\DynamicDataObject'))
      ->createProperty('source', new ClassProperty('CallRail\\Tracker\\Source\\Source'))
      ->createProperty('swap_target', new StringProperty());
  }
}