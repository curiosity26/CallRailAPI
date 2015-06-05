<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 4:56 PM
 */

namespace CallRail\Company\Response;


use CallRail\Response\CallRailResponse;

class CompanyResponse extends CallRailResponse {

  public function getCollectionClass() {
    return 'CallRail\\Company\\Collection\\CompanyCollection';
  }

  public function getCollectionField() {
    return 'companies';
  }

}