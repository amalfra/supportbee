<?php

namespace Amalfra\SupportBee;

use Amalfra\SupportBee\Exceptions\ConfigException;
use Amalfra\SupportBee\API\Tickets;
use Amalfra\SupportBee\API\Replies;
use Amalfra\SupportBee\API\Comments;
use Amalfra\SupportBee\API\Agents;
use Amalfra\SupportBee\API\Labels;
use Amalfra\SupportBee\API\Groups;
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
  const BASE    = 'https://COMPANY.supportbee.com/';

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
    return Tickets::tickets($options);
  }

  public function ticket($id = 0) {
    return Tickets::get_ticket($id);
  }

  public function createTicket($options = array()) {
    return Tickets::create_ticket($options);
  }

  public function deleteTicket($id = 0) {
    return Tickets::delete_ticket($id);
  }

  public function archiveTicket($id = 0) {
    return Tickets::archive_ticket($id);
  }

  public function unarchiveTicket($id = 0) {
    return Tickets::unarchive_ticket($id);
  }

  public function assignTicket($options = array()) {
    return Tickets::assign_ticket($options);
  }

  public function starTicket($id = 0) {
    return Tickets::star_ticket($id);
  }

  public function unstarTicket($id = 0) {
    return Tickets::unstar_ticket($id);
  }

  public function spamTicket($id = 0) {
    return Tickets::spam_ticket($id);
  }

  public function unspamTicket($id = 0) {
    return Tickets::unspam_ticket($id);
  }

  public function trashTicket($id = 0) {
    return Tickets::trash_ticket($id);
  }

  public function untrashTicket($id = 0) {
    return Tickets::untrash_ticket($id);
  }
  
  public function addLabelToTicket($id = 0, $label = '') {
    return Tickets::add_label($id, $label);
  }
  
  public function removeLabelFromTicket($id = 0, $label = '') {
    return Tickets::remove_label($id, $label);
  }

  public function searchTickets($options = array()) {
    if (!is_array($options)) {
      $options = array('query' => $options);
    }

    return Tickets::search($options);
  }

  public function replies($id = 0) {
    return Replies::replies($id);
  }

  public function reply($ticket_id = 0, $reply_id = 0) {
    return Replies::get_reply($ticket_id, $reply_id);
  }

  public function comments($id = 0) {
    return Comments::comments($id);
  }

  public function createComment($ticket_id = 0, $options = array()) {
    return Comments::create_comment($ticket_id, $options);
  }

  public function agents($options = array()) {
    if (!is_array($options)) {
      $options = array('with_invited' => $options);
    }

    return Agents::agents($options);
  }

  public function agent($id = 0) {
    return Agents::get_agent($id);
  }

  public function labels() {
    return Labels::labels();
  }

  public function groups($options = array()) {
    return Groups::groups($options);
  }

  public function snippets() {
    return Snippets::snippets();
  }

  public function webhooks() {
    return WebHooks::webhooks();
  }

  public function avgFirstResponseTimeReport($options = array()) {
    return Reports::avg_first_response_time_report($options);
  }

  public function ticketsCountReport($options = array()) {
    return Reports::tickets_count_report($options);
  }

  public function repliesCountReport($options = array()) {
    return Reports::replies_count_report($options);
  }

  public function emails() {
    return Emails::emails();
  }

  public function createEmail($options = array()) {
    return Emails::create_email($options);
  }
}
