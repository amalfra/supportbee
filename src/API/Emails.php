<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Emails
 *
 * @package Amalfra\SupportBee\API
 */
class Emails extends HTTP {
  public function emails() {
    return $this->process_request('emails');
  }

  public function create_email($options = array()) {
    self::validate($options, array(
      'name', 'email', 'filter_spam', 'use_agent_name'
    ), array('email'));

    return $this->process_request('emails', array('forwarding_address' => $options), 'POST');
  }
}
