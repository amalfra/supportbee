<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Reports
 *
 * @package Amalfra\SupportBee\API
 */
class Reports extends HTTP {
  public function avg_first_response_time_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since',
    ));

    return $this->process_request('reports/avg_first_response_time', $options);
  }

  public function tickets_count_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since',
    ));

    return $this->process_request('reports/tickets_count', $options);
  }

  public function replies_count_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since',
    ));

    return $this->process_request('reports/replies_count', $options);
  }
}
