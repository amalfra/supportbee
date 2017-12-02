<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Groups
 *
 * @package SupportBee\API\Groups
 */
class Groups extends API {

  public static function groups($options = array()) {
    self::validate($options, array(
      'with_users', 'user'
    ));

    return self::process_request('groups', $options);
  }
}
