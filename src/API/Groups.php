<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Groups
 *
 * @package Amalfra\SupportBee\API
 */
class Groups extends HTTP {

  public static function groups($options = array()) {
    self::validate($options, array(
      'with_users', 'user'
    ));

    return self::process_request('groups', $options);
  }
}
