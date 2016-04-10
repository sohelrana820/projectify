<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementsTypesTable Test Case
 */
class RequirementsTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirements_types',
        'app.types',
        'app.properties',
        'app.users',
        'app.profiles',
        'app.messages',
        'app.users_messages',
        'app.categories',
        'app.favorites',
        'app.visits',
        'app.requirements',
        'app.categories_requirements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementsTypes') ? [] : ['className' => 'App\Model\Table\RequirementsTypesTable'];
        $this->RequirementsTypes = TableRegistry::get('RequirementsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementsTypes);

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
