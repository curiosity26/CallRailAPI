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

    return $this;
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

  /**
   * @param $function
   * @param array $params
   * @return \RESTKit\Response\Response
   */
  protected function sendRequest($function, $params = array()) {
    $url = self::getFunctionUrl($function, $params);
    $this->request->setUrl($url);
    $response = $this->request->send();

    return $response;
  }

  /**
   * @param null $company_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\Company\Response\CompanyResponse
   */
  public function companies($company_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\Company\\Response\\CompanyResponse');

    if (null !== $company_id) {
      return $this->sendRequest("companies/$company_id", $params);
    }
    return $this->sendRequest('companies', $params);
  }

  /**
   * @param null $user_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\User\Response\UserResponse
   */
  public function users($user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\User\\Response\\UserResponse');

    if (null !== $user_id) {
      return $this->sendRequest("users/$user_id", $params);
    }

    return $this->sendRequest('users', $params);
  }

  /**
   * @param null $company_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\Source\Response\SourceResponse
   */
  public function sources($company_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\Source\\Response\\SourceResponse');

    if (null !== $company_id) {
      $params['company_id'] = $company_id;
    }

    return $this->sendRequest('sources', $params);
  }

  /**
   * @param $company_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\Tracker\Source\Response\SourceTrackerResponse
   */
  public function sourceTrackers($company_id, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\Tracker\\Source\\Response\\SourceTrackerResponse');

    return $this->sendRequest("companies/$company_id/source_trackers", $params);
  }

  /**
   * @param $company_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\Tracker\Session\Response\SessionTrackerResponse
   */
  public function sessionTrackers($company_id, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\Tracker\\Session\\Response\\SessionTrackerResponse');

    return $this->sendRequest("companies/$company_id/session_trackers", $params);
  }

  /**
   * @param $company_id
   * @param $tracker_id
   * @param null $user_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\User\Response\UserResponse
   */
  public function sourceTrackerCallAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\User\\Response\\UserResponse');

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/call_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/call_alerts", $params);
  }

  /**
   * @param $company_id
   * @param $tracker_id
   * @param null $user_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\User\Response\UserResponse
   */
  public function sourceTrackerSMSAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\User\\Response\\UserResponse');

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/sms_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/source_trackers/$tracker_id/sms_alerts", $params);
  }

  /**
   * @param $company_id
   * @param $tracker_id
   * @param null $user_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\User\Response\UserResponse
   */
  public function sessionTrackerCallAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\User\\Response\\UserResponse');

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/call_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/call_alerts", $params);
  }

  /**
   * @param $company_id
   * @param $tracker_id
   * @param null $user_id
   * @param int $page
   * @param int $per_page
   * @return \CallRail\User\Response\UserResponse
   */
  public function sessionTrackerSMSAlerts($company_id, $tracker_id, $user_id = null, $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\User\\Response\\UserResponse');

    if (null !== $user_id) {
      return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/sms_alerts/$user_id", $params);
    }

    return $this->sendRequest("companies/$company_id/session_trackers/$tracker_id/sms_alerts", $params);
  }

  /**
   * @param null $company_id
   * @param \DateTime $start_date
   * @param \DateTime $end_date
   * @param int $page
   * @param int $per_page
   * @return \CallRail\Call\Response\CallResponse
   */
  public function calls($company_id = null, \DateTime $start_date = null, \DateTime $end_date = null,
                        $page = 1, $per_page = 100) {
    $params = array('page' => $page, 'per_page' => min($per_page, 1000));
    $this->request->setResponseClass('CallRail\\Call\\Response\\CallResponse')
    ;
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