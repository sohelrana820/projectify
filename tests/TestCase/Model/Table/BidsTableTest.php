<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidsTable Test Case
 */
class BidsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bids',
        'app.properties',
        'app.users',
        'app.profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bids') ? [] : ['className' => 'App\Model\Table\BidsTable'];
        $this->Bids = TableRegistry::get('Bids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bids);

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
     * Test getIDbyUUID method
     *
     * @return void
     */
    public function testGetIDbyUUID()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findList method
     *
     * @return void
     */
    public function testFindList()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test bidOverview method
     *
     * @return void
     */
    public function testBidOverview()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
