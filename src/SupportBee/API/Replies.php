<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Replies
 *
 * @package SupportBee\API\Replies
 */
class Replies extends API {

  public static function replies($id = 0) {
    return self::process_request('tickets/'.$id.'/replies');
  }

  public static function get_reply($ticket_id = 0, $reply_id = 0) {
    return self::process_request('tickets/'.$ticket_id.'/replies/'.$reply_id);	
  }
}
