<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Comments
 *
 * @package SupportBee\API\Comments
 */
class Comments extends API {

  public static function comments( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/comments' );
  }
}
