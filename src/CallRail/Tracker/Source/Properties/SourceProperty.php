<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 1:04 AM
 */

namespace CallRail\Tracker\Source\Properties;


use CallRail\Tracker\Source\Source;
use RESTKit\Properties\StringProperty;

class SourceProperty extends StringProperty {

  static public $types = array(
    Source::TYPE_ALL,
    Source::TYPE_DIRECT,
    Source::TYPE_LANDING_PARAMS,
    Source::TYPE_OFFLINE,
    Source::TYPE_SEARCH,
    Source::TYPE_WEB_REFERRER
  );

  public function __construct($default = null) {
    parent::__construct($default);
  }

  public function getType() {
    return "source_tracker_source";
  }

  static public function condition($value = null) {
    if ($value !== null && in_array($value, self::$types)) {
      return parent::condition($value);
    }

    return null;
  }
}