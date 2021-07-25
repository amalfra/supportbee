<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Snippets
 *
 * @package Amalfra\SupportBee\API
 */
class Snippets extends HTTP {

  public static function snippets() {
    return self::process_request('snippets');
  }
}
