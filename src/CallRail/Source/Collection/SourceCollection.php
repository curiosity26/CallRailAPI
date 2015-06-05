<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 7:45 PM
 */

namespace CallRail\Source\Collection;


use RESTKit\Collection\Collection;

class SourceCollection extends Collection {

  public function getItemClass() {
    return 'CallRail\\Source\\Source';
  }
}