<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 6/5/15
 * Time: 6:49 PM
 */

namespace CallRail\Properties;


use CallRail\Intl\TimeZone;
use RESTKit\Properties\StringProperty;

class TimeZoneProperty extends StringProperty {

  static protected $zones = array(
    TimeZone::ABU_DHABI,
    TimeZone::ADELAIDE,
    TimeZone::ALASKA,
    TimeZone::ALMATY,
    TimeZone::AMERICAN_SAMOA,
    TimeZone::AMSTERDAM,
    TimeZone::ARIZONA,
    TimeZone::ASTANA,
    TimeZone::ATHENS,
    TimeZone::ATLANTIC,
    TimeZone::AUKLAND,
    TimeZone::AZORES,
    TimeZone::BAGHDAD,
    TimeZone::BAKU,
    TimeZone::BANGKOK,
    TimeZone::BEIJING,
    TimeZone::BELGRADE,
    TimeZone::BERLIN,
    TimeZone::BERN,
    TimeZone::BOGOTA,
    TimeZone::BRASILIA,
    TimeZone::BRATISLAVA,
    TimeZone::BRISBANE,
    TimeZone::BRUSSELS,
    TimeZone::BELGRADE,
    TimeZone::BERLIN,
    TimeZone::BERN,
    TimeZone::BOGOTA,
    TimeZone::BUCHAREST,
    TimeZone::BUDAPEST,
    TimeZone::BUENOS_AIRES,
    TimeZone::CAIRO,
    TimeZone::CANBERRA,
    TimeZone::CAPE_VERDE_ISLANDS,
    TimeZone::CARACAS,
    TimeZone::CASABLANCA,
    TimeZone::CENTRAL_AMERICA,
    TimeZone::CENTRAL_TIME,
    TimeZone::CHENNAI,
    TimeZone::CHIHUAHUA,
    TimeZone::CHONGQING,
    TimeZone::COPENHAGEN,
    TimeZone::DARWIN,
    TimeZone::DHAKA,
    TimeZone::DUBLIN,
    TimeZone::EASTERN_TIME,
    TimeZone::EDINBURGH,
    TimeZone::EKATERINBURG,
    TimeZone::FIJI,
    TimeZone::GEORGETOWN,
    TimeZone::GUADALAJARA,
    TimeZone::GREENLAND,
    TimeZone::GUAM,
    TimeZone::HANOI,
    TimeZone::HARARE,
    TimeZone::HAWAII,
    TimeZone::HELSINKI,
    TimeZone::HOBART,
    TimeZone::HONG_KONG,
    TimeZone::IDL_WEST,
    TimeZone::INDIANA,
    TimeZone::IRKUTSK,
    TimeZone::ISLAMABAD,
    TimeZone::ISTANBUL,
    TimeZone::JAKARTA,
    TimeZone::JERUSALEM,
    TimeZone::KABUL,
    TimeZone::KAMCHATKA,
    TimeZone::KARACHI,
    TimeZone::KATHMANDU,
    TimeZone::KOLKATA,
    TimeZone::KRASNOYARSK,
    TimeZone::KUALA_LUMPUR,
    TimeZone::KUWAIT,
    TimeZone::KYIV,
    TimeZone::LA_PAZ,
    TimeZone::LIMA,
    TimeZone::LISBON,
    TimeZone::LJUBLJANA,
    TimeZone::LONDON,
    TimeZone::MADRID,
    TimeZone::MAGADAN,
    TimeZone::MARSHALL_ISLANDS,
    TimeZone::MAZATLAN,
    TimeZone::MELBOURNE,
    TimeZone::MEXICO_CITY,
    TimeZone::MID_ATLANTIC,
    TimeZone::MIDWAY_ISLAND,
    TimeZone::MINSK,
    TimeZone::MONROVIA,
    TimeZone::MONTERREY,
    TimeZone::MOSCOW,
    TimeZone::MOUNTAIN_TIME,
    TimeZone::MUMBAI_BURMA,
    TimeZone::MUSCAT,
    TimeZone::NAIROBI,
    TimeZone::NEW_CALEDONIA,
    TimeZone::NEW_DEHLI,
    TimeZone::NEWFOUNDLAND,
    TimeZone::NOVOSIBIRSK,
    TimeZone::NUKUALOFA,
    TimeZone::OSAKA,
    TimeZone::PACIFIC_TIME,
    TimeZone::PARIS,
    TimeZone::PERTH,
    TimeZone::PORT_MORESBY,
    TimeZone::PRAGUE,
    TimeZone::PRETORIA,
    TimeZone::QUILTO,
    TimeZone::RANGOON,
    TimeZone::RIGA,
    TimeZone::RIYADH,
    TimeZone::ROME,
    TimeZone::SANTIAGO,
    TimeZone::SAPPORO,
    TimeZone::SARAJEVO,
    TimeZone::SASKATCHEWAN,
    TimeZone::SEOUL,
    TimeZone::SINGAPORE,
    TimeZone::SKOPJE,
    TimeZone::SOFIA,
    TimeZone::SOLOMON_ISLANDS,
    TimeZone::SOMOA,
    TimeZone::SRI_JAYAWARDENEPURA,
    TimeZone::ST_PETERSBURG,
    TimeZone::STOCKHOLM,
    TimeZone::SYDNEY,
    TimeZone::TAIPEI,
    TimeZone::TALLINN,
    TimeZone::TASHKENT,
    TimeZone::TBILISI,
    TimeZone::TEHRAN,
    TimeZone::TIJUANA,
    TimeZone::TOKELAU_ISLANDS,
    TimeZone::TOKYO,
    TimeZone::ULAAN_BATAAR,
    TimeZone::URUMQI,
    TimeZone::UTC,
    TimeZone::VIENNA,
    TimeZone::VILNIUS,
    TimeZone::VLADIVOSTOK,
    TimeZone::VOLGOGRAD,
    TimeZone::WARSAW,
    TimeZone::WELLINGTON,
    TimeZone::WEST_CENTRAL_AFRICA,
    TimeZone::YAKUTSK,
    TimeZone::YEREVAN,
    TimeZone::ZAGREB
  );

  public function __construct($default = null) {
    parent::__construct($default);
  }

  public function getType() {
    return 'time_zone';
  }

  static public function condition($value = null) {
    if ($value !== null && in_array($value, self::$zones)) {
      return parent::condition($value);
    }

    return null;
  }
}