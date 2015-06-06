<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 10:58 PM
 */

namespace CallRail\SourceTracker;


use CallRail\SourceTracker\Properties\SourceProperty;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\ClassProperty;
use RESTKit\Properties\StringProperty;

class SourceTracker extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('name', new StringProperty())
      ->createProperty('call_flow', new ClassProperty('RESTKit\\DynamicDataObject'))
      ->createProperty('tracking_number', new ClassProperty('RESTKit\\DynamicDataObject'))
      ->createProperty('source', new SourceProperty())
      ->createProperty('swap_target', new StringProperty());
  }
}