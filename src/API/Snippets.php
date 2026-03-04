<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Snippets
 *
 * @package Amalfra\SupportBee\API
 */
class Snippets extends HTTP {
  public function snippets() {
    return $this->process_request('snippets');
  }
}
