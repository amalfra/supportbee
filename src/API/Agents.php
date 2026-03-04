<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Agents
 *
 * @package Amalfra\SupportBee\API
 */
class Agents extends HTTP {
  public function agents($options = array()) {
    self::validate($options, array(
      'with_invited'
    ));

    return $this->process_request('users', $options);
  }

  public function get_agent($id = 0) {
    return $this->process_request('users/'.$id);
  }
}
