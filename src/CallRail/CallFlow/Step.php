<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 11:30 PM
 */

namespace CallRail\CallFlow;


use RESTKit\DynamicDataObject;
use RESTKit\Properties\IntegerProperty;

class Step extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('id', new IntegerProperty());
  }
}