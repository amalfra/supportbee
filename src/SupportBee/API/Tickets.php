<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;
use \InvalidArgumentException;

/**
 * Class Tickets
 *
 * @package SupportBee\API\Tickets
 */
class Tickets extends API {

  public static function tickets( $options = array() )
  {
    self::validate( $options, array(
      'per_page', 'page', 'archived', 'spam',
      'trash', 'replies', 'max_replies', 'assigned_user',
      'assigned_group', 'starred', 'label', 'since',
      'until', 'requester_emails'
    ) );

    return self::process_request( 'tickets', $options );
  }

  public static function get_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id );
  }

  public static function search( $options = array() )
  {
    self::validate( $options, array(
      'per_page', 'page', 'spam',
      'trash', 'query'
    ), array( 'query' ) );

    return self::process_request( 'tickets/search', $options );
  }

  public static function create_ticket( $options = array() )
  {
    self::validate( $options, array(
      'subject', 'requester_name', 'requester_email', 'copied_emails',
      'notify_requester', 'content', 'attachment_ids', 'forwarding_address_id'
    ), array( 'subject', 'requester_name', 'requester_email', 'content' ) );

    return self::process_request( 'tickets/', array('ticket' => $options), 'POST' );
  }

  public static function delete_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id, array(), 'DELETE' );
  }

  public static function archive_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/archive', array(), 'POST' );
  }

  public static function unarchive_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/archive', array(), 'DELETE' );
  }

  public static function assign_ticket( $id = 0, $options = array() )
  {
    if ( !is_array($options) || !is_int($id) )
      throw new InvalidArgumentException( 'Invalid type of Parameters passed' );

    return self::process_request( 'tickets/'.$id.'/assignments', array("assignment" => $options), 'POST' );
  }

  public static function star_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/star', array(), 'POST' );
  }

  public static function unstar_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/star', array(), 'DELETE' );
  }

  public static function spam_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/spam', array(), 'POST' );
  }

  public static function unspam_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/spam', array(), 'DELETE' );
  }

  public static function trash_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/trash', array(), 'POST' );
  }

  public static function untrash_ticket( $id = 0 )
  {
    return self::process_request( 'tickets/'.$id.'/trash', array(), 'DELETE' );
  }
  
  public static function add_label( $id, $label )
  {
    return self::process_request( 'tickets/'.$id.'/labels/'.$label, array(), 'POST' );
  }
  
  public static function remove_label( $id, $label )
  {
    return self::process_request( 'tickets/'.$id.'/labels/'.$label, array(), 'DELETE' );
  }
}
