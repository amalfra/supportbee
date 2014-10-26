<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Agents
 *
 * @package SupportBee\API\Agents
 */
class Agents extends API {

  public static function agents( $options = array() )
  {
    self::validate( $options, array(
      'with_invited'
    ) );

    return self::process_request( 'users', $options );
  }

  public static function get_agent( $id = 0 )
  {
    return self::process_request( 'users/'.$id );
  }
}
