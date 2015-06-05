<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 5:29 PM
 */

namespace CallRail\Company\Collection;


use RESTKit\Collection\Collection;

class CompanyCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\Company\\Company';
  }
}