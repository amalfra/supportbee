<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class WebHooks
 *
 * @package Amalfra\SupportBee\API
 */
class WebHooks extends HTTP {

  public static function webhooks() {
    return self::process_request('web_hooks');
  }
}
