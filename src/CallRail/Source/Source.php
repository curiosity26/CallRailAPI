<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 7:38 PM
 */

namespace CallRail\Source;


use CallRail\Properties\PhoneNumberProperty;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\ArrayProperty;
use RESTKit\Properties\DateTimeProperty;
use RESTKit\Properties\IntegerProperty;
use RESTKit\Properties\StringProperty;

class Source extends DynamicDataObject {

  public function initiate() {

    $this->createProperty('id', new IntegerProperty())
      ->createProperty('name', new StringProperty())
      ->createProperty('created_at', new DateTimeProperty())
      ->createProperty('disabled_at', new DateTimeProperty())
      ->createProperty('company_name', new StringProperty())
      ->createProperty('company_id', new IntegerProperty())
      ->createProperty('destination_number', new PhoneNumberProperty())
      ->createProperty('tracking_numbers', new ArrayProperty())
      ->createProperty('type', new StringProperty());
  }
}