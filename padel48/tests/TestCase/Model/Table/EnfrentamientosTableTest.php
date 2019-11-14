<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnfrentamientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnfrentamientosTable Test Case
 */
class EnfrentamientosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnfrentamientosTable
     */
    public $Enfrentamientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Enfrentamientos',
        'app.Grupos',
        'app.FechasPropuestas',
        'app.ParejasDisputanEnfrentamiento'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enfrentamientos') ? [] : ['className' => EnfrentamientosTable::class];
        $this->Enfrentamientos = TableRegistry::getTableLocator()->get('Enfrentamientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enfrentamientos);

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
