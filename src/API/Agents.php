<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Agents
 *
 * @package Amalfra\SupportBee\API
 */
class Agents extends HTTP {
  public static function agents($options = array()) {
    self::validate($options, array(
      'with_invited'
    ));

    return self::process_request('users', $options);
  }

  public static function get_agent($id = 0) {
    return self::process_request('users/'.$id);
  }
}
