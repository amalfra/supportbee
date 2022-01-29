<?php

namespace Amalfra\SupportBee\API;

use Amalfra\SupportBee\HTTP;

/**
 * Class Reports
 *
 * @package Amalfra\SupportBee\API
 */
class Reports extends HTTP {
  public static function avg_first_response_time_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since', 'until'
    ));

    return self::process_request('reports/avg_first_response_time', $options);
  }

  public static function tickets_count_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since', 'until'
    ));

    return self::process_request('reports/tickets_count', $options);
  }

  public static function replies_count_report($options = array()) {
    self::validate($options, array(
      'user', 'team', 'label', 'since', 'until'
    ));

    return self::process_request('reports/replies_count', $options);
  }
}
