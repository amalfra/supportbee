<?php

namespace SupportBee\API;

use SupportBee\SupportBee as SupportBee;
use SupportBee\API as API;

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
		) );

		return self::process_request( 'tickets/', array('ticket' => $options), 'POST' );
	}
}
