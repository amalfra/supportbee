<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Comments
 *
 * @package Amalfra\SupportBee\API
 */
class Comments extends HTTP {
  public static function comments($id = 0) {
    return self::process_request('tickets/'.$id.'/comments');
  }

  public static function create_comment($ticket_id = 0, $options = array()) {
    self::validate($options, array(
      'html', 'text', 'attachment_ids'
    ), array('html', 'text'));

    $body = array('content' => array());
    if (isset($body['html'])) {
      $body['content']['html'] = $options['html'];
    }
    if (isset($body['text'])) {
      $body['content']['text'] = $options['text'];
    }
    if (isset($body['attachment_ids'])) {
      $body['content']['attachment_ids'] = $options['attachment_ids'];
    }

    return self::process_request('tickets/'.$ticket_id.'/comments', array('comment' => $body), 'POST');
  }
}
