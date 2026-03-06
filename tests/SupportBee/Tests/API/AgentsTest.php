<?php

namespace Amalfra\SupportBee\Tests\API;

use \InvalidArgumentException;
use \PHPUnit\Framework\TestCase;
use Amalfra\SupportBee\API\Agents;

class AgentsTest extends TestCase {
  // agents() tests start

  /** @test */
  public function validateAgentsThrowExecptionInvalidParam() {
    try {	
      $mock = $this->getMockBuilder(Agents::class)
        ->onlyMethods(['process_request'])
        ->getMock();

      $mock->agents(['test' => true]);
      $this->fail();
    } catch (InvalidArgumentException $e) {
      $this->assertTrue(true);
    }
  }

  /** @test */
  public function validateAgentsWithParamCorrectResponse() {
    $expectedResponse = [
      'users' => [
        [
          'id' => 18105297,
          'type' => 'user',
          'email' => 'test@test.com',
          'first_name' => 'Test',
          'last_name' => 'Test',
          'name' => 'Test Test',
          'role' => 'admin',
          'agent' => true,
          'two_factor_authentication_enabled' => false,
          'picture' => [
            'thumb20' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb24' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb32' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb48' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb64' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb128' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
          ],
          'can_members_access_group_tickets' => null,
          'email_domains' => [],
          'members_count' => 0,
          'teams' => [],
        ],
      ],
    ];

    $mock = $this->getMockBuilder(Agents::class)
      ->onlyMethods(['process_request'])
      ->getMock();

    $mock->expects($this->once())
      ->method('process_request')
      ->with('users', ['with_invited' => true])
      ->willReturn($expectedResponse);

    $result = $mock->agents(['with_invited' => true]);

    $this->assertEquals($expectedResponse, $result);
  }

  /** @test */
  public function validateAgentsWithoutParamCorrectResponse() {
    $expectedResponse = [
      'users' => [
        [
          'id' => 18105297,
          'type' => 'user',
          'email' => 'test@test.com',
          'first_name' => 'Test',
          'last_name' => 'Test',
          'name' => 'Test Test',
          'role' => 'admin',
          'agent' => true,
          'two_factor_authentication_enabled' => false,
          'picture' => [
            'thumb20' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb24' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb32' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb48' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb64' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb128' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
          ],
          'can_members_access_group_tickets' => null,
          'email_domains' => [],
          'members_count' => 0,
          'teams' => [],
        ],
      ],
    ];

    $mock = $this->getMockBuilder(Agents::class)
      ->onlyMethods(['process_request'])
      ->getMock();

    $mock->expects($this->once())
      ->method('process_request')
      ->with('users')
      ->willReturn($expectedResponse);

    $result = $mock->agents();

    $this->assertEquals($expectedResponse, $result);
  }

  // agents() tests end

  // get_agent() tests start

  /** @test */
  public function validateGetAgentWorksWithoutId() {
    $expectedResponse = [];

    $mock = $this->getMockBuilder(Agents::class)
      ->onlyMethods(['process_request'])
      ->getMock();

    $mock->expects($this->once())
      ->method('process_request')
      ->with('users/0')
      ->willReturn($expectedResponse);

    $result = $mock->get_agent();

    $this->assertEquals($expectedResponse, $result);
  }

  /** @test */
  public function validateGetAgentWorksWithId() {
    $expectedResponse = [
      'user' => [
        [
          'id' => 18105297,
          'type' => 'user',
          'email' => 'test@test.com',
          'first_name' => 'Test',
          'last_name' => 'Test',
          'name' => 'Test Test',
          'role' => 'admin',
          'agent' => true,
          'two_factor_authentication_enabled' => false,
          'picture' => [
            'thumb20' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb24' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb32' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb48' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb64' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
            'thumb128' => 'https://secure.gravatar.com/avatar/cxvbhdcfghfrf.png',
          ],
          'can_members_access_group_tickets' => null,
          'email_domains' => [],
          'members_count' => 0,
          'teams' => [],
        ],
      ],
    ];

    $mock = $this->getMockBuilder(Agents::class)
      ->onlyMethods(['process_request'])
      ->getMock();

    $mock->expects($this->once())
      ->method('process_request')
      ->with('users/1')
      ->willReturn($expectedResponse);

    $result = $mock->get_agent(1);

    $this->assertEquals($expectedResponse, $result);
  }

  // get_agent() tests start
}
