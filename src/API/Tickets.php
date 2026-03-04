<?php

namespace Amalfra\SupportBee\API;

use \InvalidArgumentException;
use Amalfra\SupportBee\HTTP;

/**
 * Class Tickets
 *
 * @package Amalfra\SupportBee\API;
 */
class Tickets extends HTTP {
  public function tickets($options = array()) {
    self::validate($options, array(
      'per_page', 'page', 'archived', 'spam',
      'trash', 'replies', 'max_replies', 'assigned_user',
      'assigned_team', 'label', 'since', 'until',
      'sort_by', 'requester_emails', 'total_only'
    ));

    return $this->process_request('tickets', $options);
  }

  public function get_ticket($id = 0) {
    return $this->process_request('tickets/'.$id);
  }

  public function search($options = array()) {
    self::validate($options, array(
      'per_page', 'page', 'spam',
      'trash', 'query'
    ), array('query'));

    return $this->process_request('tickets/search', $options);
  }

  public function create_ticket($options = array()) {
    self::validate($options, array(
      'subject', 'requester_name', 'requester_email', 'cc', 'bcc',
      'notify_requester', 'content', 'forwarding_address_id',
    ), array('subject', 'requester_name', 'requester_email', 'content'));

    return $this->process_request('tickets/', array('ticket' => $options), 'POST');
  }

  public function delete_ticket($id = 0) {
    return $this->process_request('tickets/'.$id, array(), 'DELETE');
  }

  public function archive_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/archive', array(), 'POST');
  }

  public function unarchive_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/archive', array(), 'DELETE');
  }

  public function assign_ticket_to_user($id = 0, $user_id = 0) {
    if (!is_int($user_id) || !is_int($id)) {
      throw new InvalidArgumentException('Invalid type of Parameters passed');
    }

    return $this->process_request('tickets/'.$id.'/user_assignment', array('user_assignment' => ['user_id' => $user_id]), 'POST' );
  }

  public function spam_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/spam', array(), 'POST');
  }

  public function unspam_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/spam', array(), 'DELETE');
  }

  public function trash_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/trash', array(), 'POST');
  }

  public function untrash_ticket($id = 0) {
    return $this->process_request('tickets/'.$id.'/trash', array(), 'DELETE');
  }

  public function add_label($id, $label) {
    return $this->process_request('tickets/'.$id.'/labels/'.$label, array(), 'POST');
  }

  public function remove_label($id, $label) {
    return $this->process_request('tickets/'.$id.'/labels/'.$label, array(), 'DELETE');
  }
}
