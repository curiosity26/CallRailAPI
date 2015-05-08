<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 5/7/15
 * Time: 7:25 PM
 */

namespace CallRail;


use RESTKit\Client\TokenClient;
use RESTKit\Request\JSONClientRequest;

class CallRail {

  /**
   * @var \RESTKit\Client\TokenClient
   */
  private $client;

  /**
   * @var \RESTKit\Request\JSONClientRequest
   */
  private $request;

  const REST_URL = "https://api.callrail.com/";
  const VERSION = "v1";

  public function __construct($token = null) {
    $this->client = new TokenClient();
    $this->request = new JSONClientRequest($this->client);

    if (null !== $token) {
      $this->setToken($token);
    }
  }

  public function setToken($token) {
    $this->client->setAccessToken("token=$token");
  }

  static public function getFunctionUrl($function, $parameters = array()) {
    $url = self::REST_URL.self::VERSION."/$function.json";

    if (!empty($parameters)) {
      $params = array();
      foreach ($parameters as $key => $value) {
        $params[] = "$key=$value";
      }
      $url .= "?".implode("&", $params);
    }

    return $url;
  }

  protected function sendRequest($function, $params = array()) {
    $url = self::getFunctionUrl($function, $params);
    $this->request->setUrl($url);
    $response = $this->request->send();

    if ($response->isSuccess()) {
      return $response->getBody();
    }
    else {
      return array();
    }
  }

  public function companies($page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    return $this->sendRequest('companies', $params);
  }

  public function users($page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    return $this->sendRequest('users', $params);
  }

  public function sources($company_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    if (null !== $company_id) {
      $params['company_id'] = $company_id;
    }

    return $this->sendRequest('sources', $params);
  }

  public function sourceTrackers($company_id, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    return $this->sendRequest("companies/$company_id/source_trackers", $params);
  }

  public function sessionTrackers($company_id, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    return $this->sendRequest("companies/$company_id/session_trackers", $params);
  }

  public function sourceTrackerCallAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/call_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/call_alerts", $params);
  }

  public function sourceTrackerSMSAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/sms_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/sms_alerts", $params);
  }

  public function sessionTrackerCallAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/call_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/call_alerts", $params);
  }

  public function sessionTrackerSMSAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/sms_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/sms_alerts", $params);
  }

  public function calls($company_id = null, \DateTime $start_date = null, \DateTime $end_date = null,
                        $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    if (null !== $company_id) {
      $params['company_id'] = $company_id;
    }
    if (null !== $start_date) {
      $params['start_date'] = $start_date;
    }
    if (null !== $end_date) {
      $params['end_date'] = $end_date;
    }

    return $this->sendRequest('calls', $params);
  }

  public function tags($company_id, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));

    return $this->sendRequest("companies/$company_id/tags", $params);
  }

}