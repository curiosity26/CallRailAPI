<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 11:12 PM
 */

namespace CallRail\Properties;


use RESTKit\Properties\StringProperty;

class PhoneNumberProperty extends StringProperty {

  public function __construct($default = null) {
    parent::__construct($default, 16);
  }

  public function getType() {
    return 'phone_number';
  }

  static public function condition($value = null) {
    if ($value !== null && preg_match('/^\+[1-9]', $value) !== FALSE) {
      return parent::condition($value);
    }

    return null;
  }
}