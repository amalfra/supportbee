<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Labels
 *
 * @package Amalfra\SupportBee\API
 */
class Labels extends HTTP {
  public function labels() {
    return $this->process_request('labels');
  }
}
