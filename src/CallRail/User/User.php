<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 6:26 PM
 */

namespace CallRail\User;


use CallRail\Properties\RoleProperty;
use RESTKit\Client\RESTClientInterface;
use RESTKit\DynamicDataObject;
use RESTKit\Properties\ClassProperty;
use RESTKit\Properties\StringProperty;

class User extends DynamicDataObject {

  public function __construct(array $values = array(), RESTClientInterface $client = null) {

    $this->createProperty('first_name', new StringProperty());
    $this->createProperty('last_name', new StringProperty());
    $this->createProperty('email', new StringProperty());
    $this->createProperty('role', new RoleProperty());
    $this->createProperty('password', new StringProperty());
    $this->createProperty('companies', new ClassProperty('CallRail\\Company\\Collection\\CompanyCollection'));

    parent::__construct($values, $client);
  }

  public function JsonSerialize() {
    $output = parent::JsonSerialize();

    $ids = array();

    foreach ($output['companies'] as $company) {
      if (is_array($company)) {
        $ids[] = $company['id'];
      }
      elseif (is_integer($company)) {
        $ids[] = $company;
      }
    }

    $output['companies'] = $ids;

    return $output;
  }
}