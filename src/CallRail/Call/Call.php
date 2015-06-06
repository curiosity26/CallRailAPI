<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 4:02 PM
 */

namespace CallRail\Call;


use CallRail\Properties\PhoneNumberProperty;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\BooleanProperty;
use RESTKit\Properties\DateTimeProperty;
use RESTKit\Properties\DoubleProperty;
use RESTKit\Properties\IntegerProperty;
use RESTKit\Properties\StringProperty;

class Call extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('id', new IntegerProperty())
      ->createProperty('start_time', new DateTimeProperty())
      ->createProperty('tracking_number', new PhoneNumberProperty())
      ->createProperty('destination_number', new PhoneNumberProperty())
      ->createProperty('caller_number', new PhoneNumberProperty())
      ->createProperty('caller_state', new StringProperty(null, 2))
      ->createProperty('caller_name', new StringProperty())
      ->createProperty('duration', new IntegerProperty())
      ->createProperty('created_at', new DateTimeProperty())
      ->createProperty('answered', new BooleanProperty())
      ->createProperty('first_call', new BooleanProperty())
      ->createProperty('note', new StringProperty())
      ->createProperty('value', new DoubleProperty())
      ->createProperty('recording', new StringProperty())
      ->createProperty('recording_player', new StringProperty())
      ->createProperty('tag', new StringProperty())
      ->createProperty('source_id', new IntegerProperty())
      ->createProperty('source_name', new StringProperty())
      ->createProperty('company_id', new IntegerProperty())
      ->createProperty('company_name', new StringProperty());
  }

  public function getCollectionClass() {
    return 'CallRail\\Call\\Collection\\CallCollection';
  }
}