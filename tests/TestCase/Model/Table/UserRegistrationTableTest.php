<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserRegistrationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserRegistrationTable Test Case
 */
class UserRegistrationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserRegistrationTable
     */
    public $UserRegistration;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserRegistration'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserRegistration') ? [] : ['className' => UserRegistrationTable::class];
        $this->UserRegistration = TableRegistry::getTableLocator()->get('UserRegistration', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserRegistration);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
