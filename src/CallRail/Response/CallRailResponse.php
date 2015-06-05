<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 5:15 PM
 */

namespace CallRail\Response;


use RESTKit\Response\JSONResponse;

class CallRailResponse extends JSONResponse {

  protected $page;
  protected $per_page;
  protected $total_pages;
  protected $total_records;
  protected $collection_field;

  public function setCollectionField($field) {
    $this->collection_field = $field;

    return $this;
  }

  public function getCollectionField() {
    return $this->collection_field;
  }

  protected function setPage($page) {
    $this->page = $page;

    return $this;
  }

  public function getPage() {
    return $this->page;
  }

  protected function setPerPage($per_page) {
    $this->per_page = $per_page;

    return $this;
  }

  public function getPerPage() {
    return $this->per_page;
  }

  protected function setTotalPages($pages) {
    $this->total_pages = $pages;

    return $this;
  }

  public function getTotalPages() {
    return $this->total_pages;
  }

  protected function setTotalRecords($records) {
    $this->total_records = $records;

    return $this;
  }

  public function getTotalRecords() {
    return $this->total_records;
  }

  public function processResponse() {
    if ($this->isSuccess()) {
      $body = (array)parent::processResponse();
      $this->setPage(isset($body['page']) ? $body['page'] : 1);
      $this->setPerPage(isset($body['per_page']) ? $body['per_page'] : 1);
      $this->setTotalPages(isset($body['total_pages']) ? $body['total_pages'] : 1);
      $this->setTotalRecords(isset($body['total_records']) ? $body['total_records'] : 1);

      $field = $this->getCollectionField();

      return $field !== null && !empty($body[$field]) ? $body[$field] : array($body);
    }

    return null;
  }
}