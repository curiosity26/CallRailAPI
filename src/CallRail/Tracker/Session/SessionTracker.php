<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:13 PM
 */

namespace CallRail\Tracker\Session;


use CallRail\Properties\CallFlowProperty;
use CallRail\Properties\CompanyProperty;
use CallRail\Properties\UserCollectionProperty;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\ArrayProperty;
use RESTKit\Properties\BooleanProperty;
use RESTKit\Properties\DateTimeProperty;
use RESTKit\Properties\StringProperty;

class SessionTracker extends DynamicDataObject {

  public function initiate() {
    $this->createProperty('name', new StringProperty())
      ->createProperty('tracking_numbers', new ArrayProperty())
      ->createProperty('company', new CompanyProperty())
      ->createProperty('sms_enabled', new BooleanProperty(false))
      ->createProperty('call_flow', new CallFlowProperty())
      ->createPropertyByGuessing('source', null)
      ->createProperty('call_alerts', new UserCollectionProperty())
      ->createProperty('sms_alerts', new UserCollectionProperty())
      ->createProperty('created_at', new DateTimeProperty())
      ->createProperty('disabled_at', new DateTimeProperty());
  }

  public function getCollectionClass() {
    return 'CallRail\\Tracker\\Session\\Collection\\SessionTrackerCollection';
  }
}