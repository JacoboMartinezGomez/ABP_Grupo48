<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParejasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParejasTable Test Case
 */
class ParejasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParejasTable
     */
    public $Parejas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Parejas',
        'app.Campeonatos',
        'app.Grupos',
        'app.Categorias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Parejas') ? [] : ['className' => ParejasTable::class];
        $this->Parejas = TableRegistry::getTableLocator()->get('Parejas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parejas);

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
