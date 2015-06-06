<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 3:24 PM
 */

namespace CallRail\Properties;


use RESTKit\Properties\ClassProperty;

class CompanyCollectionProperty extends ClassProperty {

  public function __construct($default = null, array $construct_args = array(), $construct_flag = true) {
    $this->setDefault($default);
    $this->setConstructArgs($construct_args);
    $this->setConstructDefaultFlag($construct_flag);
  }

  public function getType() {
    return 'CallRail\\Company\\Collection\\CompanyCollection';
  }

}