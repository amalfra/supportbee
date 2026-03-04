<?php

namespace Amalfra\SupportBee;

use Amalfra\SupportBee\Exceptions\ConfigException;
use Amalfra\SupportBee\API\Tickets;
use Amalfra\SupportBee\API\Replies;
use Amalfra\SupportBee\API\Comments;
use Amalfra\SupportBee\API\Agents;
use Amalfra\SupportBee\API\Labels;
use Amalfra\SupportBee\API\Snippets;
use Amalfra\SupportBee\API\WebHooks;
use Amalfra\SupportBee\API\Reports;
use Amalfra\SupportBee\API\Emails;

/**
 * Class Client
 *
 * @package Amalfra\SupportBee
 */
class Client {
  const BASE = 'https://COMPANY.supportbee.com/';

  public static $base_url   = null;
  public static $auth_token = null;
  public static $headers    = array();

  public function __construct($config = array()) {
    $this->validate($config);

    self::$base_url = str_replace('COMPANY', $config['company'], self::BASE);
    self::$auth_token = $config['token'];

    self::$headers = array(
      'Content-Type' => 'application/json',
      'Accept'       => 'application/json'
    );
  }

  /**
   * Validates the SupportBee configuration options
   *
   * @params  array       $config
   *
   * @throws  SupportBee\Exceptions\ConfigException    When a config value does not meet its validation criteria
   */
  private function validate($config) {
    if (count($config) == 0) {
      throw new ConfigException('Auth token and company need to be set.');
    }

    if (!isset($config['token'])) {
      throw new ConfigException('Token is required.');
    }

    if (!isset($config['company'])) {
      throw new ConfigException('Company name is required.');
    }
  }

  public function tickets($options = array()) {
    return new Tickets()->tickets($options);
  }

  public function ticket($id = 0) {
    return new Tickets()->get_ticket($id);
  }

  public function createTicket($options = array()) {
    return new Tickets()->create_ticket($options);
  }

  public function deleteTicket($id = 0) {
    return new Tickets()->delete_ticket($id);
  }

  public function archiveTicket($id = 0) {
    return new Tickets()->archive_ticket($id);
  }

  public function unarchiveTicket($id = 0) {
    return new Tickets()->unarchive_ticket($id);
  }

  public function assignTicketToUser($id = 0, $options = array()) {
    return new Tickets()->assign_ticket_to_user($id, $options);
  }

  public function spamTicket($id = 0) {
    return new Tickets()->spam_ticket($id);
  }

  public function unspamTicket($id = 0) {
    return new Tickets()->unspam_ticket($id);
  }

  public function trashTicket($id = 0) {
    return new Tickets()->trash_ticket($id);
  }

  public function untrashTicket($id = 0) {
    return new Tickets()->untrash_ticket($id);
  }
  
  public function addLabelToTicket($id = 0, $label = '') {
    return new Tickets()->add_label($id, $label);
  }
  
  public function removeLabelFromTicket($id = 0, $label = '') {
    return new Tickets()->remove_label($id, $label);
  }

  public function searchTickets($options = array()) {
    if (!is_array($options)) {
      $options = array('query' => $options);
    }

    return new Tickets()->search($options);
  }

  public function replies($id = 0) {
    return new Replies()->replies($id);
  }

  public function reply($ticket_id = 0, $reply_id = 0) {
    return new Replies()->get_reply($ticket_id, $reply_id);
  }

  public function comments($id = 0) {
    return new Comments()->comments($id);
  }

  public function createComment($ticket_id = 0, $options = array()) {
    return new Comments()->create_comment($ticket_id, $options);
  }

  public function agents($options = array()) {
    if (!is_array($options)) {
      $options = array('with_invited' => $options);
    }

    return new Agents()->agents($options);
  }

  public function agent($id = 0) {
    return new Agents()->get_agent($id);
  }

  public function labels() {
    return new Labels()->labels();
  }

  public function snippets() {
    return new Snippets()->snippets();
  }

  public function webhooks() {
    return new WebHooks()->webhooks();
  }

  public function avgFirstResponseTimeReport($options = array()) {
    return new Reports()->avg_first_response_time_report($options);
  }

  public function ticketsCountReport($options = array()) {
    return new Reports()->tickets_count_report($options);
  }

  public function repliesCountReport($options = array()) {
    return new Reports()->replies_count_report($options);
  }

  public function emails() {
    return new Emails()->emails();
  }

  public function createEmail($options = array()) {
    return new Emails()->create_email($options);
  }
}
