<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 1:01 AM
 */

namespace CallRail\Tracker\Source;


use CallRail\Tracker\Source\Properties\SourceProperty;
use RESTKit\DynamicDataObject;

class Source extends DynamicDataObject {

  const TYPE_ALL = "all";
  const TYPE_LANDING_PARAMS = "landing_params";
  const TYPE_OFFLINE = "offline";
  const TYPE_WEB_REFERRER = "web_referrer";
  const TYPE_DIRECT = "direct";
  const TYPE_SEARCH = "search";

  public function initiate() {
    $this->createProperty('type', new SourceProperty());
  }
}