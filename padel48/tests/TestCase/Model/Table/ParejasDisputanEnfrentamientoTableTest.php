<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParejasDisputanEnfrentamientoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParejasDisputanEnfrentamientoTable Test Case
 */
class ParejasDisputanEnfrentamientoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParejasDisputanEnfrentamientoTable
     */
    public $ParejasDisputanEnfrentamiento;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ParejasDisputanEnfrentamiento',
        'app.Campeonatos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ParejasDisputanEnfrentamiento') ? [] : ['className' => ParejasDisputanEnfrentamientoTable::class];
        $this->ParejasDisputanEnfrentamiento = TableRegistry::getTableLocator()->get('ParejasDisputanEnfrentamiento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ParejasDisputanEnfrentamiento);

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
