<?php

namespace Amalfra\SupportBee\Tests;

use Amalfra\SupportBee\Client;
use Amalfra\SupportBee\Exceptions\ConfigException;
use \PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
  // __construct() tests start

  /** @test */
  public function validateObjectCreationWithoutTokenAndCompany() {
    try {		
      $supportbee = new Client();
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
      $supportbee = new Client($config);
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
      $supportbee = new Client($config);
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
      $supportbee = new Client($config);
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
      $supportbee = new Client($config);
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
    $supportbee = new Client($config);
    $this->assertEquals('https://mycompany.supportbee.com/', Client::$base_url);
    $this->assertEquals(array(
      'Content-Type' => 'application/json',
      'Accept'       => 'application/json'
    ), Client::$headers);
  }

  // __construct() tests end
}
