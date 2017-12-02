<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Emails
 *
 * @package SupportBee\API\Emails
 */
class Emails extends API {

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
