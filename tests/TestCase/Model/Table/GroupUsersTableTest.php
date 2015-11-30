<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupUsersTable Test Case
 */
class GroupUsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.group_users',
        'app.users',
        'app.courses',
        'app.colleges',
        'app.groups',
        'app.students',
        'app.events',
        'app.event_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GroupUsers') ? [] : ['className' => 'App\Model\Table\GroupUsersTable'];
        $this->GroupUsers = TableRegistry::get('GroupUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GroupUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
