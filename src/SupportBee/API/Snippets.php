<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Snippets
 *
 * @package SupportBee\API\Snippets
 */
class Snippets extends API {

  public static function snippets() {
    return self::process_request('snippets');
  }
}
