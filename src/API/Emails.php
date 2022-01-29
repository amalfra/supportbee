<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Emails
 *
 * @package Amalfra\SupportBee\API
 */
class Emails extends HTTP {
  public static function emails() {
    return self::process_request('emails');
  }

  public static function create_email($options = array()) {
    self::validate($options, array(
      'name', 'email', 'filter_spam', 'use_agent_name'
    ), array('email'));

    return self::process_request('emails', array('forwarding_address' => $options), 'POST');
  }
}
