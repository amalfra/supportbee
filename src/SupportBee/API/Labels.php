<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Labels
 *
 * @package SupportBee\API\Labels
 */
class Labels extends API {

  public static function labels()
  {
    return self::process_request( 'labels' );
  }
}
