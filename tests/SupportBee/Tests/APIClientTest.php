<?php

namespace SupportBee\Tests;

use SupportBee\API as API;
use \PHPUnit_Framework_TestCase;
use \ReflectionMethod;
use \InvalidArgumentException;

class APIClientTest extends PHPUnit_Framework_TestCase {

	private function getProtectedProperty( $object, $property, $args = [] ) {
		$r = new ReflectionMethod( get_class($object), $property );
		$r->setAccessible( true );
		return $r->invokeArgs( $object, $args );
  }

	// validate() tests start

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

	/** @test */
	public function validateThrowExecptionNoValidParam() {
		$api = new API();

		try {		
			$this->getProtectedProperty( $api, 'validate', [['p1' => '1', 'p2' => '2'], ['p1']] );
			$this->fail();
		} catch ( InvalidArgumentException $e ) {
			$this->assertTrue( TRUE );
    }
	}

	/** @test */
	public function validateThrowExecptionNoRequiredParam() {
		$api = new API();

		try {		
			$this->getProtectedProperty( $api, 'validate', [['p1' => '1'], ['p1', 'p2'], ['p2']] );
			$this->fail();
		} catch ( InvalidArgumentException $e ) {
			$this->assertTrue( TRUE );
    }
	}

	// validate() tests end

	// tfTostring() tests start

	/** @test */
	public function validateTfTostring() {
		$api = new API();
		$var = true;

		$this->getProtectedProperty( $api, 'tfTostring', [&$var, &$var] );
		
		if ( gettype($var) === 'string' )
			$this->assertTrue( TRUE );
		else
			$this->fail();
	}

	// tfTostring() tests end

	// inject() tests start

	/** @test */
	public function validateInject() {
		$api = new API();
		$var = array( 'val1' => 'key1' );

		$this->getProtectedProperty( $api, 'inject', [&$var] );

		if ( array_key_exists( 'auth_token', $var ) )
			$this->assertTrue( TRUE );
		else
			$this->fail();
	}

	// inject() tests end
}
