<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Replies
 *
 * @package Amalfra\SupportBee\API
 */
class Replies extends HTTP {
  public function replies($id = 0) {
    return $this->process_request('tickets/'.$id.'/replies');
  }

  public function get_reply($ticket_id = 0, $reply_id = 0) {
    return $this->process_request('tickets/'.$ticket_id.'/replies/'.$reply_id);	
  }
}
