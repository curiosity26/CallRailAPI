<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 4:07 PM
 */

namespace CallRail\Company;

use CallRail\Intl\TimeZone;
use CallRail\Properties\TimeZoneProperty;
use RESTKit\Client\RESTClientInterface;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\StringProperty;


class Company extends DynamicDataObject {

  public function initiate() {

    $this->createProperty('name', new StringProperty())
      ->createProperty('time_zone', new TimeZoneProperty(TimeZone::EASTERN_TIME));

  }

  public function getCollectionClass() {
    return 'CallRail\\Company\\Collection\\CompanyCollection';
  }

  public function setName($name) {
    $this->__set('name', $name);

    return $this;
  }

  public function getName() {
    return $this->__get('name');
  }

  public function setTimeZone($tz) {
    $this->__set('time_zone', $tz);

    return $this;
  }

  public function getTimeZone() {
    return $this->__get('time_zone');
  }
}