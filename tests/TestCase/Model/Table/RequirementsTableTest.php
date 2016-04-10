<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementsTable Test Case
 */
class RequirementsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirements',
        'app.users',
        'app.profiles',
        'app.properties',
        'app.categories',
        'app.types',
        'app.favorites',
        'app.visits',
        'app.messages',
        'app.users_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Requirements') ? [] : ['className' => 'App\Model\Table\RequirementsTable'];
        $this->Requirements = TableRegistry::get('Requirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requirements);

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

    /**
     * Test checkRequirement method
     *
     * @return void
     */
    public function testCheckRequirement()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test requirement method
     *
     * @return void
     */
    public function testRequirement()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
