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

  public function initiate() {

    $this->createProperty('first_name', new StringProperty())
      ->createProperty('last_name', new StringProperty())
      ->createProperty('email', new StringProperty())
      ->createProperty('role', new RoleProperty())
      ->createProperty('password', new StringProperty())
      ->createProperty('companies', new ClassProperty('CallRail\\Company\\Collection\\CompanyCollection'));

  }

  public function getCollectionClass() {
    return 'CallRail\\User\\Collection\\UserCollection';
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