<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesRequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesRequirementsTable Test Case
 */
class CategoriesRequirementsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories_requirements',
        'app.categories',
        'app.properties',
        'app.users',
        'app.profiles',
        'app.messages',
        'app.users_messages',
        'app.types',
        'app.favorites',
        'app.visits',
        'app.requirements',
        'app.requirements_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CategoriesRequirements') ? [] : ['className' => 'App\Model\Table\CategoriesRequirementsTable'];
        $this->CategoriesRequirements = TableRegistry::get('CategoriesRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesRequirements);

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
