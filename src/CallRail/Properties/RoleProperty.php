<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 6:39 PM
 */

namespace CallRail\Properties;


use CallRail\User\Role;
use RESTKit\Properties\StringProperty;

class RoleProperty extends StringProperty {

  static private $roles = array(
    ROLE::ADMINISTRATOR,
    ROLE::REPORTING,
    ROLE::NOTIFICATION
  );

  public function __construct($default = null) {
    parent::__construct($default);
  }

  public function getType() {
    return 'role';
  }

  static public function condition($value = null) {
    if ($value !== null && in_array($value, self::$roles)) {
      return parent::__construct($value);
    }

    return null;
  }

}