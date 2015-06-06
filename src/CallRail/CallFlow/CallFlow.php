<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 11:29 PM
 */

namespace CallRail\CallFlow;


use CallRail\Properties\PhoneNumberProperty;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\BooleanProperty;
use RESTKit\Properties\ClassProperty;
use RESTKit\Properties\IntegerProperty;
use RESTKit\Properties\StringProperty;

class CallFlow extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('type', new StringProperty())
      ->createProperty('recording_enabled', new BooleanProperty())
      ->createProperty('initial_steps_id', new IntegerProperty())
      ->createProperty('destination_number', new PhoneNumberProperty())
      ->createProperty('greeting_text', new StringProperty())
      ->createProperty('greeting_url', new StringProperty())
      ->createProperty('steps', new ClassProperty('CallRail\\CallFlow\\Collection\\StepCollection'));
  }
}