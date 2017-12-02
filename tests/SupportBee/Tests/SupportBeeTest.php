<?php

namespace SupportBee\Tests;

use SupportBee\SupportBee as SupportBee;
use SupportBee\Exceptions\ConfigException as ConfigException;
use \PHPUnit\Framework\TestCase;

class SupportBeeTest extends TestCase {
  // __construct() tests start

  /** @test */
  public function validateObjectCreationWithoutTokenAndCompany() {
    try {		
      $supportbee = new SupportBee();
      $this->fail();
    } catch (ConfigException $e) {
      $this->assertTrue(true);
    }
  }

  /** @test */
  public function validateObjectCreationWithoutToken() {
    try {		
      $config = array(
        'company' => 'my-company'
      );
      $supportbee = new SupportBee($config);
      $this->fail();
    } catch (ConfigException $e) {
      $this->assertTrue(true);
    }
  }

  /** @test */
  public function validateObjectCreationWithoutCompany() {
    try {		
      $config = array(
        'company' => 'abcd'
      );
      $supportbee = new SupportBee($config);
      $this->fail();
    } catch (ConfigException $e) {
      $this->assertTrue(true);
    }
  }
  
  /** @test */
  public function validateObjectCreationWithInvalidCompany() {
    try {		
      $config = array(
        'company' => 'abcd34$%'
      );
      $supportbee = new SupportBee($config);
      $this->fail();
    } catch (ConfigException $e) {
      $this->assertTrue(true);
    }
  }

  /** @test */
  public function validateObjectCreationWithInvalidToken() {
    try {		
      $config = array(
        'token' => 'abcd34$%'
      );
      $supportbee = new SupportBee($config);
      $this->fail();
    } catch (ConfigException $e) {
      $this->assertTrue(true);
    }
  }

  /** @test */
  public function validateObjectCreationWithValidTokenAndCompany() {	
    $config = array(
      'token' => 'abcd',
      'company' => 'mycompany'
    );
    $supportbee = new SupportBee($config);
    $this->assertEquals('https://mycompany.supportbee.com/', SupportBee::$base_url);
    $this->assertEquals(array(
      'Content-Type' => 'application/json',
      'Accept'       => 'application/json'
    ), SupportBee::$headers);
  }

  // __construct() tests end
}
