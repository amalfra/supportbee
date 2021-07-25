<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Labels
 *
 * @package Amalfra\SupportBee\API
 */
class Labels extends HTTP {

  public static function labels() {
    return self::process_request('labels');
  }
}
