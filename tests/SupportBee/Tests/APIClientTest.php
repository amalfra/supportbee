<?php

namespace SupportBee\Tests;

use SupportBee\API as API;
use \PHPUnit_Framework_TestCase;
use \ReflectionMethod;
use \InvalidArgumentException;

class APIClientTest extends PHPUnit_Framework_TestCase {

	private function getProtectedProperty( $object, $property, $args = [] ) {
		$r = new ReflectionMethod( $object, $property );
		$r->setAccessible( true );
		return $r->invokeArgs( $object, $args );
  }

	/** @test */
	public function validateThrowExecptionNotArrayParamPassed() {
		$api = new API();

		try {		
			$this->getProtectedProperty( $api, 'validate', ['notArr'] );
			$this->fail();
		} catch ( InvalidArgumentException $e ) {
			$this->assertTrue( TRUE );
    }
	}
}
