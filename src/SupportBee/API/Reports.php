<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

/**
 * Class Reports
 *
 * @package SupportBee\API\Reports
 */
class Reports extends API {

  public static function avg_first_response_time_report( $options = array() )
  {
    self::validate( $options, array(
      'user', 'team', 'label', 'since', 'until'
    ) );

    return self::process_request( 'reports/avg_first_response_time', $options  );
  }

  public static function tickets_count_report( $options = array() )
  {
    self::validate( $options, array(
      'user', 'team', 'label', 'since', 'until'
    ) );

    return self::process_request( 'reports/tickets_count', $options  );
  }

  public static function replies_count_report( $options = array() )
  {
    self::validate( $options, array(
      'user', 'team', 'label', 'since', 'until'
    ) );

    return self::process_request( 'reports/replies_count', $options  );
  }


}
