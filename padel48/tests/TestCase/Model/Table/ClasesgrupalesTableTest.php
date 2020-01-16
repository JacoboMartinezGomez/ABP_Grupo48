<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClasesGrupalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClasesGrupalesTable Test Case
 */
class ClasesGrupalesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClasesGrupalesTable
     */
    public $ClasesGrupales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ClasesGrupales',
        'app.Usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ClasesGrupales') ? [] : ['className' => ClasesGrupalesTable::class];
        $this->ClasesGrupales = TableRegistry::getTableLocator()->get('ClasesGrupales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClasesGrupales);

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
