<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class WebHooks
 *
 * @package SupportBee\API\WebHooks
 */
class WebHooks extends API {

  public static function webhooks() {
    return self::process_request('web_hooks');
  }
}
