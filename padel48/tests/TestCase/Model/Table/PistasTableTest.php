<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PistasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PistasTable Test Case
 */
class PistasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PistasTable
     */
    public $Pistas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pistas',
        'app.Horarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pistas') ? [] : ['className' => PistasTable::class];
        $this->Pistas = TableRegistry::getTableLocator()->get('Pistas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pistas);

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
}
