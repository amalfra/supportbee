<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Replies
 *
 * @package Amalfra\SupportBee\API
 */
class Replies extends HTTP {

  public static function replies($id = 0) {
    return self::process_request('tickets/'.$id.'/replies');
  }

  public static function get_reply($ticket_id = 0, $reply_id = 0) {
    return self::process_request('tickets/'.$ticket_id.'/replies/'.$reply_id);	
  }
}
