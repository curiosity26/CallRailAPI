<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/6/15
 * Time: 4:11 PM
 */

namespace CallRail\Call\Response;


use CallRail\Response\CallRailResponse;

class CallResponse extends CallRailResponse {

  protected $company_id;
  protected $start_date;
  protected $end_date;

  public function getCollectionClass() {
    return 'CallRail\\Call\\Collection\\CallCollection';
  }

  public function getCollectionField() {
    return 'calls';
  }

  public function setCompanyId($id = null) {
    $this->company_id = $id;

    return $this;
  }

  public function getCompanyId() {
    return $this->company_id;
  }

  public function setStartDate($date = null) {
    if ($date !== null) {
      $date = new \DateTime($date);
    }
    $this->start_date = $date;

    return $this;
  }

  public function getStartDate() {
    return $this->start_date;
  }

  public function setEndDate($date = null) {
    if ($date !== null) {
      $date = new \DateTime($date);
    }
    $this->end_date = $date;

    return $this;
  }

  public function getEndDate() {
    return $this->end_date;
  }

  public function processResponse() {
    if ($this->isSuccess()) {
      $body = $this->getResponseCode() != 201
        ?   json_decode($this->body)
        :   json_decode($this->getResponse()->getRawResponse());

      $body = (array)$body;
      $this->setCompanyId(!empty($body['company_id']) ? $body['company_id'] : null);
      $this->setStartDate(!empty($body['start_date']) ? $body['start_date'] : null);
      $this->setEndDate(!empty($body['end_date']) ? $body['end_date'] : null);

      return parent::processResponse();
    }

    return null;
  }
}