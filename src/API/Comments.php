<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Comments
 *
 * @package Amalfra\SupportBee\API
 */
class Comments extends HTTP {
  public function comments($id = 0) {
    return $this->process_request('tickets/'.$id.'/comments');
  }

  public function create_comment($ticket_id = 0, $options = array()) {
    self::validate($options, array(
      'html', 'text', 'attachments'
    ), array('html', 'text'));

    $body = array('content' => array());
    if (isset($options['html'])) {
      $body['content']['html'] = $options['html'];
    }
    if (isset($options['text'])) {
      $body['content']['text'] = $options['text'];
    }
    if (isset($options['attachments'])) {
      $body['content']['attachments'] = $options['attachments'];
    }

    return $this->process_request('tickets/'.$ticket_id.'/comments', array('comment' => $body), 'POST');
  }
}
